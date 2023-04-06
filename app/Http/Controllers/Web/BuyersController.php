<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use Illuminate\Http\Request;
use App\Models\{Buyer,Seller,Storage,FavoriteStorage,Country,Category,StorageRating,BuyerInquiry,Chat,StorageImages,StorageAminites,Aminites};
use Illuminate\Support\Facades\{Auth,Hash};
use DB,Session,share;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class BuyersController extends Controller
{
    protected $guard = 'buyer';

    public function buyerSignup() {

        try {
            $countries = Country::get();
            return view('buyer.signup',compact('countries'));
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function buyerRegister(Request $request) {

        try {

            $countries = Country::get();

            $profile_image = $request->profile_image;

            if($request->has('profile_image') && $request->profile_image != '') {

                $image = $request->file('profile_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/buyer/profile_image');
                $image->move($destinationPath, $name);
                $profile_image = 'buyer/profile_image/'.$name;
            }
            else {
                $profile_image = NULL;
            }

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request->password;
            $country_code = $request->country_code;

            $checkEmail = Buyer::where('email',$email)->first();
            $checkMobile = Buyer::where('phone',$phone)->first();

            if(isset($checkEmail) && $checkEmail != '') {

                session()->flash('error', 'Email is already exists. Please try with another email.');
                return view('buyer.signup',compact('countries'));
            }
            else if(isset($checkMobile) && $checkMobile != '') {

                session()->flash('error', 'Mobile No. is already exists. Please try with another No.');
                return view('buyer.signup',compact('countries'));
            }

            $buyer = new Buyer();  
            $buyer->name = $name;
            $buyer->email = $email;
            $buyer->password = Hash::make($password);
            $buyer->profile_image = $profile_image;
            $buyer->country_code = $country_code;
            $buyer->phone = $phone;
            $buyer->otp = rand(1000,9999);
            $buyer->otp_verify = 'N';
            $buyer->custom_token = uniqid(base64_encode(Str::random(10)));
            $buyer->save();

            $input['name'] = $name;
            $input['otp'] = $buyer->otp;
            $input['email'] = $email;

            // Send OTP over mail
            \Mail::send('emails.sendOTP', $input, function ($message) use($input) {
                $message->to($input['email'])->subject('Verification Code');
            });
            //echo "cx";exit;
            session(['email' => $email]);
            session(['page' => 'Login']);

            // Add Firebase User
            /*$data['name'] = $name;
            $data['email'] = $email;
            $userFirebase = $this->createFirebaseUser($data);

            // Update Firebase UID
            if($userFirebase != "failed") {
                $firebase_uid =  $userFirebase->uid;
            }

            if(isset($firebase_uid) && $firebase_uid != '') {

                $buyer_id = $buyer->id;

                $update_firebase_uid = Buyer::find($buyer_id);
                $update_firebase_uid->firebase_uid = $firebase_uid;
                $update_firebase_uid->save();
            }*/

            return redirect('/verify-otp');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function sendOTP(Request $request) {

        try {

            $email = $request->email;
            $page = $request->page;

            $buyer_details = Buyer::where('email',$email)->first();

            if(isset($buyer_details) && $buyer_details != '') {

                $buyer_details->otp = rand(1000,9999);
                $buyer_details->otp_verify = 'N';
                $buyer_details->save();

                $input['name'] = $buyer_details->name;
                $input['otp'] = $buyer_details->otp;
                $input['email'] = $email;

                // Send OTP over mail
                \Mail::send('emails.sendOTP', $input, function ($message) use($input) {
                    $message->to($input['email'])->subject('Verification Code');
                });

                session(['email' => $email]);
                session(['page' => $page]);
                return redirect('/verify-otp');
            }
            else {

                session()->flash('error', 'Email is not registered.');
                return redirect('/forgot-password');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function saveVerifyOTP(Request $request) {

        try {

            $digit1 = $request->digit1;
            $digit2 = $request->digit2;
            $digit3 = $request->digit3;
            $digit4 = $request->digit4;
            $otp = $digit1.$digit2.$digit3.$digit4;

            $email = $request->email;
            $page = $request->page;
            $buyer_details = Buyer::where('email',$email)->first();

            if(isset($buyer_details) && $buyer_details != '') {

                $get_otp = $buyer_details->otp;

                if($get_otp == $otp) {

                    $buyer_details->otp_verify = 'Y';
                    $buyer_details->save();
                    
                    session(['email' => $email]);

                    if($page == 'Login') {
                        return redirect('/verification-success');
                    }
                    else if($page == 'Reset') {
                        return redirect('/reset-password');
                    }
                }
                else {

                    session(['email' => $email]);
                    session()->flash('error', 'OTP Mismatched.');
                    return redirect('/verify-otp');
                }
            }
            else {

                session()->flash('error', 'OTP Mismatched.');
                return redirect('/verify-otp');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function saveLocation(Request $request) {

        try {

            $email = Session()->get('email');

            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $buyer_details = Buyer::where('email',$email)->first();

            if(isset($buyer_details) && $buyer_details != '') {

                $buyer_details->latitude = $latitude;
                $buyer_details->longitude = $longitude;
                $buyer_details->save();

                Session()->put('email', '');
                return redirect('/login'); 
            }
            else {

                session()->flash('error', 'Please Register Your Email.');
                return redirect('/location');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function setPassword(Request $request) {
        
        try {

            $email = $request->email;
            $buyer_details = Buyer::where('email',$email)->first();

            $password = $request->password;
            $confirm_password = $request->confirm_password;

            if($password == $confirm_password) {

                $buyer_details->password = Hash::make($request->password);
                $buyer_details->save();
                
                session(['email' => $email]);
                return redirect('/reset-success');
            }
            else {

                session(['email' => $email]);
                session()->flash('error', 'Password are Mismatched.');
                return redirect('/reset-password');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function buyerLogin(Request $request) {

        try {

            if (auth()->guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password])) {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                if(isset($buyer) && $buyer->active_block_status == 0) {

                    session()->flash('error', 'You are Currently Blocked.');
                    return redirect('/login');
                }
                elseif(isset($buyer) && $buyer->active_block_status == 1) {
                   
                    if(Hash::check($request->password,$buyer->password)) {

                        // Login Firebase User
                        /*$device_token = $request->device_token;
                        $this->loginFirebaseUser($device_token,$buyer_id);*/

                        return redirect('/');
                    }
                }
            }
            session()->flash('error', 'Credential Mismatched.');
            return redirect('/login');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function manageProfile(Request $request) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        return view('buyer.manage-profile',compact('buyer','buyer_id'));
    }

    public function getFavorite(Request $request) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        $get_list = FavoriteStorage::where('buyer_id',$buyer_id)->select('storage_id')->orderBy('created_at','desc')->get();

        if($get_list->count() == 0) {
            return view('buyer.favorite-list',compact('buyer','buyer_id'));
        }

        // Get all favourite storages
        $query = Storage::with(['category','storage_image']);

        $query = $query->with(['storage_aminites' => function($sql) {
            $sql->with(['aminites_detail' => function($query) {
                $query->select('id','name');
            }]);
        }]);
        
        $storages = $query->whereIN('id',$get_list)->get();

        return view('buyer.favorite-list',compact('buyer','buyer_id','storages'));
    }

    public function getContactedstorages(Request $request) {
        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        $get_list = BuyerInquiry::where('buyer_id',$buyer_id)->select('storage_id')->orderBy('created_at','desc')->get();

         $query = Storage::with(['category','storage_image']);

        $query = $query->with(['storage_aminites' => function($sql) {
            $sql->with(['aminites_detail' => function($query) {
                $query->select('id','name');
            }]);
        }]);

         $storages = $query->whereIN('id',$get_list)->get();

         return view('buyer.contacted-storages',compact('buyer','buyer_id','storages'));

    }
    public function updateProfile(Request $request) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        $buyer->name = $request->name;
        $buyer->phone = $request->phone;
        $profile_image = $request->file('profile_image');

        if(isset($profile_image) && $profile_image != '') {

            $name = time().'.'.$profile_image->getClientOriginalExtension();
            $d_path = public_path('../storage/app/public/buyer/profile_image');
            $profile_image->move($d_path,$name);
            $buyer1="buyer/profile_image/".$name;
            $buyer->profile_image = $buyer1;
        }
        $buyer->update();

        session()->flash('type','message');
        session()->flash('message', 'Profile Updated Successfully.');
        return redirect('manage-profile');
    }

    public function changePassword(Request $request) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        return view('buyer.changepassword',compact('buyer'));
    }
    
    public function updatePassword(Request $request) {

        $messages = [

            'old_password.required' => 'Old Password is Required.',
            'new_password.required' => 'New Password is Required.',
            'confirm_password.required' => 'Confirm Password is Required.',
        ];

        $validator = $this->validate($request, [

            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ],$messages);

        if(Hash::check($request->old_password,Auth::guard('buyer')->user()->password) == true) {

            if($request->new_password == $request->confirm_password) { 

                $buyer = Buyer::find(Auth::guard('buyer')->user()->id);

                $buyer->password = Hash::make($request->new_password);
                $buyer->update();
                
                session()->flash('type','message');
                session()->flash('message', 'Password Reset Successfully.');
                auth()->guard('buyer')->logout();
                return redirect('/login');
            }
            else {

                session()->flash('error', 'New Password and Confirm Password are not match.');
                return redirect()->back();
            }
        }
        else {

            session()->flash('error', 'Current Password are not correct.Please try again.');
            return redirect()->back();
        }
    }

    // Social Login
    public function buyerGoogleLogin() {

        Session()->put('role_nm', 'buyer');
        $url = config('global.url').'/login/google';
        return redirect($url);
    }

    public function buyerFacebookLogin() {

        Session()->put('role_nm', 'buyer');
        $url = config('global.url').'/login/facebook';
        return redirect($url);
    }

    // Storage Details
    public function storageDetail($slug) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();
        $storage = Storage::withAvg('storage_rating','rate')->where('slug',$slug)->first();
        $storage_images = StorageImages::where('storage_id',$storage->id)->get();
        $storage_aminites = StorageAminites::with('aminites_detail')->where('storage_id',$storage->id)->get();
        $storage_rates = StorageRating::with('buyer')->where('storage_id',$storage->id)->get();
        $count = sizeof($storage_rates);
        // For Social Share
            $current_url = url()->current();
            $msg = 'Self Storage';
            
            //$socialShare = \Share::page($current_url,$msg)->facebook()->twitter()->linkedin()->whatsapp()->telegram();

        return view('buyer.storage-details',compact('buyer','buyer_id','storage','storage_images','storage_rates','count','storage_aminites'));
    }

    public function storageInquiry(Request $request , $slug) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();
        $storage = Storage::where('slug',$slug)->first();

        $inquiry = New BuyerInquiry();
        $inquiry->buyer_id = $buyer->id;
        $inquiry->storage_id = $storage->id;
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->message = $request->message;
        $inquiry->save();

        session()->flash('type','message');
        session()->flash('message', 'Inquiry Added Successfully.');
        return redirect()->back();
    }

    public function storageReview(Request $request , $slug) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();
        $storage = Storage::where('slug',$slug)->first();

        $rate = New StorageRating();
        $rate->buyer_id = $buyer->id;
        $rate->storage_id = $storage->id;
        $rate->rate = $request->rate;
        $rate->review = $request->review;
        $rate->save();

        session()->flash('type','message');
        session()->flash('message', 'Thanks For Rating.');
        return redirect()->back();
    }

    public function storageFavoriteAdd(Request $request , $slug) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();
        $storage = Storage::where('slug',$slug)->first();

        $favorite = New FavoriteStorage();
        $favorite->buyer_id = $buyer->id;
        $favorite->storage_id = $storage->id;
        $favorite->save();

        session()->flash('type','message');
        session()->flash('message', 'Storage Added In Favorite.');
        return redirect()->back();
    }

    public function storageFavoriteRemove(Request $request , $slug) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();
        $storage = Storage::where('slug',$slug)->first();

        FavoriteStorage::where('buyer_id',$buyer_id)->where('storage_id',$storage->id)->delete();

        session()->flash('type','message');
        session()->flash('message', 'Storage Removed From Favorite.');
        return redirect()->back();
    }

    public function addPropertyToFavourite($storage_id) {

        try {

            $buyer_id = Auth::guard('buyer')->user()->id;

            $check = FavoriteStorage::where(['buyer_id' => $buyer_id,'storage_id' => $storage_id])->first();

            if(isset($check)) {
                
                $check->delete();
                $data['message'] = 'Delete';
            }
            else {

                $add = new FavoriteStorage();
                $add->buyer_id = $buyer_id;
                $add->storage_id = $storage_id;
                $add->save();

                $data['message'] = 'Success';
            }
            return json_encode($data);
        }
        catch(\Exception $e) {
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

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

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

            $query = $query->where(function($query) use ($sort) {
                if(isset($_COOKIE["current_latitude"])) {
                $latitude = $_COOKIE["current_latitude"];
                }

                if(isset($_COOKIE["current_longitude"])) {
                $longitude = $_COOKIE["current_longitude"];
                }
                $query = $query->select(DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
                * cos(radians(storages.latitude)) 
                * cos(radians(storages.longitude) - radians(" . $longitude . ")) 
                + sin(radians(" .$latitude. ")) 
                * sin(radians(storages.latitude))) AS distance"))->orderby('distance', 'asc');
            });
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

        if($rate != '') {
           $query->Join('storage_rating','storage_rating.storage_id','=','storages.id');
            $query = $query->where('storage_rating.rate','=',$rate)->groupBy('storage_rating.rate');
           // print_r($query); exit;
        }

        if($type != '') { 
            $query = $query->where(function($query) use ($type) {
                $query = $query->where('storages.type','=',$type);        
            });
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

        
        $storage = $query->where('cat_id',$category->id)->orderBy('storages.id','desc')->get();
        $store = $query->where('cat_id',$category->id)->orderBy('storages.id','desc')->first();

        $storages_count = sizeof($storage);

        // Get Commercial Size
        $commercial_size = self::getCommercialSizeList();

        // Get Residential Size
        $residential_size = self::getResidentialSizeList();

        $locations = array();$i=0;
        foreach ($storage as $key => $value) {
            
            $locations[$i] = [$value->address,$value->latitude,$value->longitude];
            $i++;
        }

        return view('buyer.storage-list',compact('storage','buyer','buyer_id','search','price','type','access','slug','category','storages_count','from','to','rate','store','sort','latitude','longitude','commercial_size','residential_size','size','locations'));
    }
}