<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AboutUs,ContactUs,FAQ,PrivacyPolicy,TermsCondition,Buyer,Seller,Storage,Category,Banners,FavoriteStorage,Country,Subscribers,StorageImages};
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use DB,Session;
use Illuminate\Support\Facades\{Auth,Hash};

class WebController extends Controller
{
    public function index() {

        try {

            // Get Banners
            $banners = Banners::get();

            // Get all filtered values
            if(isset($_POST['category_id']) && $_POST['category_id'] != '') {
                $category_id = $_POST['category_id'];
            }
            else {
                $category_id = '';
            }

            // Checked Order is selected or not for seller type
            if(isset($_POST['order_name']) && $_POST['order_name'] != '') {
                $order_name = $_POST['order_name'];
            }
            else {
                $order_name = '';
            }

            // Get Categories
            $categories = Category::get();

            if(auth()->guard('buyer')->user() == '' && auth()->guard('seller')->user() == '') {

                $storages = Storage::with(['storage_aminites' => function($sql) {
            
                    $sql->with(['aminites_detail' => function($query) {
                        $query->select('id','name');
                    }]);

                }])->with(['category','storage_image'])->orderby('id','desc')->get();

                return view('index',compact('storages','categories'));
            }
            else if(auth()->guard('seller')->user() != '') {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();
                $today_date = date('Y-m-d');

                // Return response
                $query = Storage::with(['storage_image','category']);

                $query->withCount(['featured_storage' => function($query1) use($seller_id,$today_date) {
                
                    $query1->where('seller_id',$seller_id);
                    $query1->where('expired_date','>=',$today_date);
                }]);

                if($category_id > 0) {
                    $query = $query->where('post.cat_id','=',$category_id);
                }

                if(isset($order_name) && $order_name != '') {

                    if($order_name == 'New') {
                        $query = $query->orderBy('id','desc');
                    }
                    else if($order_name == 'Old') {
                        $query = $query->orderBy('id','asc');
                    }
                    else if($order_name == 'Alpha') {
                        $query = $query->orderBy('title','asc');
                    }
                }
                else {
                    $query = $query->orderBy('id','desc');
                }
                $seller_storages = $query->where('seller_id',$seller_id)->get();

                $storages = Storage::with('category')->with('storage_image')->orderby('id','desc')->get();
                // Order List
                $order_list = array();
                $order_list['New'] = "New First";
                $order_list['Old'] = "Old First";
                $order_list['Alpha'] = "Alphabetical(A-Z)";

                return view('seller.home',compact('categories','seller','seller_id','seller_storages','storages','category_id','order_list','order_name','banners'));
            }
            else if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();
                $storages = Storage::with('category','storage_image','favorite_storage')->orderby('id','desc')->get();
              //  echo $storages->favorite_storage->storage_id; exit;
                $favorites = FavoriteStorage::All();

                return view('buyer.home',compact('categories','buyer','buyer_id','category_id','banners','storages','favorites'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function subscribeNewsletter() {

        $email = $_GET['email'];

        $subscriber_details = Subscribers::where('email','=',$email)->first();

        if(isset($subscriber_details) && $subscriber_details != '') {

            $msg = "You are already subscribed.";
            return json_encode($msg);exit;
        }
        else {

            $add = new Subscribers();
            $add->email = $email;
            $add->save();

            $msg = "Subscribed.";
            return json_encode($msg);exit;
        }
    }

    public function aboutUs() {

        try {

            if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                $about_us = AboutUs::first();
                return view('about-us',compact('about_us','buyer'));
            }
            else if(auth()->guard('seller')->user() != '') {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();

                $about_us = AboutUs::first();
                return view('about-us',compact('about_us','seller'));
            }
            else {

                $about_us = AboutUs::first();
                return view('about-us',compact('about_us'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function contactUs() {

        try {

            if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us','buyer'));
            }
            else if(auth()->guard('seller')->user() != '') {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();

                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us','seller'));
            }
            else {

                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function contactInquiry(Request $request) {

        try {

            $contact_us = new ContactUs();  
            $contact_us->name = $request->name;
            $contact_us->email = $request->email;
            $contact_us->subject = $request->subject;
            $contact_us->message = $request->message;
            $contact_us->save();

            session()->flash('type','message');
            session()->flash('message', 'Contact Inquiry Added Successfully.');
            return redirect('/contact-us');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function faqList() {

        try {

            $faq_list = FAQ::get();
            return view('faq-list',compact('faq_list'));
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function privacyPolicy() {

        try {

            $privacy_policy = PrivacyPolicy::first();
            return view('privacy-policy',compact('privacy_policy'));
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function termsCondition() {

        try {

            if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition' , 'buyer'));
            }
            else if(auth()->guard('seller')->user() != '') {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();

                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition' , 'seller'));
            }
            else {

                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function redirectToGoogle() {

        try {
            return Socialite::driver('google')->redirect();
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function handleGoogleCallback(Request $request) {

        try {

            $password = Str::random(10);
            $user = Socialite::driver('google')->stateless()->user();
            $social_id = $user->getId();
            $custom_token = uniqid(base64_encode(Str::random(10)));
            
            // OAuth Two Providers
            $user_firstname = substr($user->getName(), 0, strpos($user->getName(), ' '));
            $user_lastname = str_replace($user_firstname.' ', '', $user->getName());
            $email = $user->getEmail();            
            
            if(empty($email)) {
                $email = '';
            }

            $user_data = array(
                'name' => $user_firstname.' '.$user_lastname,
                'google_id' => $social_id,
                'email' => $email,
                'password' => Hash::make($password),
            );

            // Now check session value for both users
            $role_nm = Session::get('role_nm');

            if($role_nm == 'buyer') {

                $existBuyer = Buyer::where('google_id','=',$social_id)->orWhere('email','=',$email)->get();
           
                if(count($existBuyer) > 0) {
                
                    $buyer_id = $existBuyer[0]->id;
                    DB::table('buyers')->where('id','=',$buyer_id)->update($user_data);
                }
                else {

                    $newBuyer = Buyer::create([
                        'name' => $user_firstname.' '.$user_lastname,
                        'email' => $email,
                        'google_id'=> $social_id,
                        'password' => Hash::make($password),
                        'custom_token' => $custom_token,
                    ]);
                }

                if (auth()->guard('buyer')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->intended('/');
                }
            }
            else if($role_nm == 'seller') {
                
                $existSeller = Seller::where('google_id','=',$social_id)->orWhere('email','=',$email)->get();
           
                if(count($existSeller) > 0) {
                
                    $seller_id = $existSeller[0]->id;
                    DB::table('sellers')->where('id','=',$seller_id)->update($user_data);
                }
                else {

                    $newSeller = Seller::create([
                        'name' => $user_firstname.' '.$user_lastname,
                        'email' => $email,
                        'google_id'=> $social_id,
                        'password' => Hash::make($password),
                        'custom_token' => $custom_token,
                    ]);
                }

                if (auth()->guard('seller')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect('/');
                }
            }
        }
        catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    // Social Login with facebook
    public function redirectToFacebook() {

        try {
            return Socialite::driver('facebook')->redirect();
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function handleFacebookCallback(Request $request) {

        try {

            $password = Str::random(10);
            $user = Socialite::driver('facebook')->stateless()->user();
            $social_id = $user->getId();
            $custom_token = uniqid(base64_encode(Str::random(10)));

            // OAuth Two Providers
            $user_firstname = substr($user->getName(), 0, strpos($user->getName(), ' '));
            $user_lastname = str_replace($user_firstname.' ', '', $user->getName());
            $email = $user->getEmail();            
            
            if(empty($email)) {
                $email = '';    
            }

            $user_data = array(
                'name' => $user_firstname.' '.$user_lastname,
                'facebook_id' => $social_id,
                'email' => $email,
                'password' => Hash::make($password),
            );

            // Now check session value for both users
            $role_nm = Session::get('role_nm');

            if($role_nm == 'buyer') {

                $existBuyer = Buyer::where('facebook_id','=',$social_id)->orWhere('email','=',$email)->get();
           
                if(count($existBuyer) > 0) {
                
                    $buyer_id = $existBuyer[0]->id;
                    DB::table('buyers')->where('id','=',$buyer_id)->update($user_data);
                }
                else {

                    $newBuyer = Buyer::create([
                        'name' => $user_firstname.' '.$user_lastname,
                        'email' => $email,
                        'facebook_id'=> $social_id,
                        'password' => Hash::make($password),
                        'custom_token' => $custom_token,
                    ]);
                }

                if (auth()->guard('buyer')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->intended('/');
                }
            }
            else if($role_nm == 'seller') {

                $existSeller = Seller::where('facebook_id','=',$social_id)->orWhere('email','=',$email)->get();
           
                if(count($existSeller) > 0) {
                
                    $seller_id = $existSeller[0]->id;
                    DB::table('sellers')->where('id','=',$seller_id)->update($user_data);
                }
                else {

                    $newSeller = Seller::create([
                        'name' => $user_firstname.' '.$user_lastname,
                        'email' => $email,
                        'facebook_id'=> $social_id,
                        'password' => Hash::make($password),
                        'custom_token' => $custom_token,
                    ]);
                }

                if (auth()->guard('seller')->attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->intended('/');
                }
            }
        }
        catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function storageList(Request $request ,$slug) {

        // Get Search Fields
        $search = $request->search;
        $price = $request->price;

        $category = Category::where('slug',$slug)->first();

        $query = Storage::with(['category','storage_image']);

        $query = $query->with(['storage_aminites' => function($sql) {
            $sql->with(['aminites_detail' => function($query) {
                $query->select('id','name');
            }]);
        }]);

        if($search != '') {
            
            $query->Join('country','country.id','=','storages.country');
        
            $query = $query->where(function($query) use ($search) {
            
                $query = $query->where('storages.city','=',$search);
                $query = $query->orwhere('storages.zipcode','=',$search);
                $query = $query->orwhere('country.name','=',$search);
            });
            
        }
        // $storages = $query->where('cat_id',$category->id)->orderBy(->get();

        if($price != '') {  
            $query = $query->where(function($query) use ($price) {
                $query = $query->where('storages.price','=',$price);        
            });
        }

        $storage = $query->where('cat_id',$category->id)->orderBy('storages.id','desc')->get();

        $storages_count = sizeof($storage);

        return view('storage-list',compact('storage','search','price','slug','category','storages_count'));
    }
}