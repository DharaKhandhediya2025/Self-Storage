<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AboutUs,ContactUs,FAQ,PrivacyPolicy,TermsCondition,Buyer,Seller,Storage,Category,Banners,FavoriteStorage,Country,Subscribers,StorageImages,StorageRating};
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use DB,Session;
use Illuminate\Support\Facades\{Auth,Hash,Avg};

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

                if(isset($_COOKIE["current_latitude"])) {
                    $latitude = $_COOKIE["current_latitude"];
                }

                if(isset($_COOKIE["current_longitude"])) {
                    $longitude = $_COOKIE["current_longitude"];
                }

                $query =  Storage::with(['category','storage_image'])->with(['storage_aminites' => function($sql) {

                    $sql->with(['aminites_detail' => function($query) {
                        $query->select('id','name');
                    }]);
                }]);

                $query = $query->select("storages.*"
                ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
                * cos(radians(storages.latitude)) 
                * cos(radians(storages.longitude) - radians(" . $longitude . ")) 
                + sin(radians(" .$latitude. ")) 
                * sin(radians(storages.latitude))) AS distance"))->groupBy("storages.id")
                ->having('distance', '<=', 50)->orderBy('distance','asc');
                    
                $storages = $query->get();

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

    public static function getCommercialSizeList() {

        $commercial_size = array();

        $commercial_size['0-1000'] = "0-1000";
        $commercial_size['1001-5000'] = "1001-5000";
        $commercial_size['5001-10000'] = "5001-10000";
        $commercial_size['10001-15000'] = "10001-15000";
        $commercial_size['15001-20000'] = "15001-20000";
        $commercial_size['20001-25000'] = "20001-25000";
        $commercial_size['25001-50000'] = "25001-50000";
        $commercial_size['50001-100000'] = "50001-100000";
        $commercial_size['101000-101000+'] = "101000-101000+";

        return $commercial_size;
    }

    public static function getResidentialSizeList() {

        $residential_size = array();

        $residential_size['5*10'] = "5*10";
        $residential_size['10*10'] = "10*10";
        $residential_size['10*15'] = "10*15";
        $residential_size['10*20'] = "10*20";
        $residential_size['10*30'] = "10*30";
        $residential_size['10*40'] = "10*40";
         
        return $residential_size;
    }

    public function storageList(Request $request ,$slug) {

        // Get Search Fields
        $search = $request->search;
        $price = $request->price;
        $type = $request->type;
        $access = $request->access;
        $from = $request->from;
        $to = $request->to;
        $size = $request->size;
        $rate = $request->rating;
        $sort = $request->sort;

        //echo $size;exit;

        $category = Category::where('slug',$slug)->first();

        $query = Storage::with(['category','storage_image']);

        $query = $query->with(['storage_aminites' => function($sql) {
            $sql->with(['aminites_detail' => function($query) {
                $query->select('id','name');
            }]);
        }]);

        $query->withAvg('storage_rating','rate')->withCount(['review' => function($query) {
            $query->where('review','!=','');
        }]);

        if($search != '') {
            
            $query->Join('country','country.id','=','storages.country');
        
            $query = $query->where(function($query) use ($search) {
            
                $query = $query->where('storages.city','=',$search);
                $query = $query->orwhere('storages.zipcode','=',$search);
                $query = $query->orwhere('country.name','=',$search);
            });
        }


        if(isset($_COOKIE["current_latitude"])) {
            $latitude = $_COOKIE["current_latitude"];
        }

        if(isset($_COOKIE["current_longitude"])) {
            $longitude = $_COOKIE["current_longitude"];
        }

        if($to != '') {

            $query = $query->select("storages.*"
            ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
            * cos(radians(storages.latitude)) 
            * cos(radians(storages.longitude) - radians(" . $longitude . ")) 
            + sin(radians(" .$latitude. ")) 
            * sin(radians(storages.latitude))) AS distance"))->groupBy("storages.id")
            ->having('distance', '<=', $to)->orderBy('distance','asc');
        }

        if($from != '') {

            $query = $query->select("storages.*"
            ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
            * cos(radians(storages.latitude)) 
            * cos(radians(storages.longitude) - radians(" . $longitude . ")) 
            + sin(radians(" .$latitude. ")) 
            * sin(radians(storages.latitude))) AS distance"))->groupBy("storages.id")
            ->having('distance', '>=', $from)->orderBy('distance','asc');
        }

        if($price != '') {  
            $query = $query->where(function($query) use ($price) {
                $query = $query->where('storages.price','=',$price);        
            });
        }

        if($sort == 'Price low to high') {  
            $query = $query->orderBy('storages.price','asc');
        }
        else if($sort == 'Price high to low') {  
            $query = $query->orderBy('storages.price','desc');
        }
        else if($sort == 'Near me') {

            $query = $query->select("storages.*"
            ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
            * cos(radians(storages.latitude)) 
            * cos(radians(storages.longitude) - radians(" . $longitude . ")) 
            + sin(radians(" .$latitude. ")) 
            * sin(radians(storages.latitude))) AS distance"))->groupBy("storages.id")
            ->having('distance', '<=', 50)->orderBy('distance','asc');

        }
        else if($sort == 'Highest rating') {

            $query = $query->orderBy('storage_rating_avg_rate','desc');
        }
        else if($sort == 'Lowest rating') {
            $query = $query->orderBy('storage_rating_avg_rate','asc');
        }
        else {
            $query = $query->orderBy('storages.id','desc');
        }

        if($type != '') {  
            $query = $query->where(function($query) use ($type) {
                $query = $query->where('storages.type','=',$type);        
            });
        }

        if($rate != '') {
           $query->Join('storage_rating','storage_rating.storage_id','=','storages.id');
            $query = $query->where('storage_rating.rate','=',$rate)->groupBy('storage_rating.rate');
           // print_r($query); exit;
        }

        if($size != '') {  
            $query = $query->where(function($query) use ($size) {
                $query = $query->where('storages.size','=',$size);        
            });
        }

        if($access != '') {  
            $query = $query->where(function($query) use ($access) {
                $query = $query->where('storages.access','=',$access);        
            });
        }
        
        $storage = $query->where('storages.cat_id',$category->id)->orderBy('storages.id','desc')->get();


        $store = $query->where('storages.cat_id',$category->id)->orderBy('storages.id','desc')->first();

        $storages_count = sizeof($storage);
        // Get Commercial Size
        $commercial_size = self::getCommercialSizeList();

        // Get Residential Size
        $residential_size = self::getResidentialSizeList();

        $locations = array();$i=0;
        foreach ($storage as $key => $value) {
            
            $locations[$i] = [$value->city,$value->latitude,$value->longitude];
            $i++;
        }

        return view('storage-list',compact('storage','search','price','type','access','slug','category','storages_count','from','to','rate','store','sort','latitude','longitude','commercial_size','residential_size','size','locations'));
    }
}