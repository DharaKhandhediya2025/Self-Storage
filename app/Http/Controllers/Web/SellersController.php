<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use Illuminate\Http\Request;
use App\Models\{Buyer,Seller,Storage,FavoriteStorage,Country,Category,StorageRating,BuyerInquiry,Chat,City,Amenities,StorageVariant,StorageAmenities,StorageImages};
use Illuminate\Support\Facades\{Auth,Hash,Route,url};
use DB,Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class SellersController extends Controller
{
    protected $guard = 'seller';

    public function sellerSignup() {

        try {
            $countries = Country::get();
            return view('seller.signup',compact('countries'));
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function sellerRegister(Request $request) {

        try {

            $countries = Country::get();

            $profile_image = $request->profile_image;

            if($request->has('profile_image') && $request->profile_image != '') {

                $image = $request->file('profile_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/seller/profile_image');
                $image->move($destinationPath, $name);
                $profile_image = 'seller/profile_image/'.$name;
            }
            else {
                $profile_image = NULL;
            }

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request->password;
            $country_code = $request->country_code;

            $checkEmail = Seller::where('email',$email)->first();
            $checkMobile = Seller::where('phone',$phone)->first();

            if(isset($checkEmail) && $checkEmail != '') {

                session()->flash('error', 'Email is already exists. Please try with another email.');
                return view('seller.signup',compact('countries'));
            }
            else if(isset($checkMobile) && $checkMobile != '') {

                session()->flash('error', 'Mobile No. is already exists. Please try with another No.');
                return view('seller.signup',compact('countries'));
            }

            $seller = new Seller();  
            $seller->name = $name;
            $seller->email = $email;
            $seller->password = Hash::make($password);
            $seller->profile_image = $profile_image;
            $seller->country_code = $country_code;
            $seller->phone = $phone;
            $seller->otp = rand(1000,9999);
            $seller->otp_verify = 'N';
            $seller->custom_token = uniqid(base64_encode(Str::random(10)));
            $seller->save();

            $input['name'] = $name;
            $input['otp'] = $seller->otp;
            $input['email'] = $email;

            // Send OTP over mail
            \Mail::send('emails.sendOTP', $input, function ($message) use($input) {
                $message->to($input['email'])->subject('Verification Code');
            });

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

                $seller_id = $seller->id;

                $update_firebase_uid = Seller::find($seller_id);
                $update_firebase_uid->firebase_uid = $firebase_uid;
                $update_firebase_uid->save();
            }*/

            return redirect('/seller/verify-otp');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function sendOTP(Request $request) {

        try {

            $email = $request->email;
            $page = $request->page;

            $seller_details = Seller::where('email',$email)->first();

            if(isset($seller_details) && $seller_details != '') {

                $seller_details->otp = rand(1000,9999);
                $seller_details->otp_verify = 'N';
                $seller_details->save();

                $input['name'] = $seller_details->name;
                $input['otp'] = $seller_details->otp;
                $input['email'] = $email;

                // Send OTP over mail
                \Mail::send('emails.sendOTP', $input, function ($message) use($input) {
                    $message->to($input['email'])->subject('Verification Code');
                });

                session(['email' => $email]);
                session(['page' => $page]);
                return redirect('/seller/verify-otp');
            }
            else {

                session()->flash('error', 'Email is not registered.');
                return redirect('/seller/forgot-password');
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
            $seller_details = Seller::where('email',$email)->first();

            if(isset($seller_details) && $seller_details != '') {

                $get_otp = $seller_details->otp;

                if($get_otp == $otp) {

                    $seller_details->otp_verify = 'Y';
                    $seller_details->save();
                    
                    session(['email' => $email]);

                    if($page == 'Login') {
                        return redirect('/seller/verification-success');
                    }
                    else if($page == 'Reset') {
                        return redirect('/seller/reset-password');
                    }
                }
                else {

                    session(['email' => $email]);
                    session()->flash('error', 'OTP Mismatched.');
                    return redirect('/seller/verify-otp');
                }
            }
            else {

                session()->flash('error', 'OTP Mismatched.');
                return redirect('/seller/verify-otp');
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
            $seller_details = Seller::where('email',$email)->first();

            if(isset($seller_details) && $seller_details != '') {

                $seller_details->latitude = $latitude;
                $seller_details->longitude = $longitude;
                $seller_details->save();

                Session()->put('email', '');
                return redirect('/seller/login'); 
            }
            else {

                session()->flash('error', 'Please Register Your Email.');
                return redirect('/seller/location');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function setPassword(Request $request) {
        
        try {

            $email = $request->email;
            $seller_details = Seller::where('email',$email)->first();

            $password = $request->password;
            $confirm_password = $request->confirm_password;

            if($password == $confirm_password) {

                $seller_details->password = Hash::make($request->password);
                $seller_details->save();
                
                session(['email' => $email]);
                return redirect('/seller/reset-success');
            }
            else {

                session(['email' => $email]);
                session()->flash('error', 'Password are Mismatched.');
                return redirect('/seller/reset-password');
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function sellerLogin(Request $request) {

        try {
            
            if (auth()->guard('seller')->attempt(['email' => $request->email, 'password' => $request->password])) {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();

                if(isset($seller) && $seller->active_block_status == 0) {

                    session()->flash('error', 'You are Currently Blocked.');
                    return redirect('seller/login');
                }
                elseif(isset($seller) && $seller->active_block_status == 1) {

                    if(Hash::check($request->password,$seller->password)) {

                        // Login Firebase User
                        /*$device_token = $request->device_token;
                        $this->loginFirebaseUser($device_token,$seller_id);*/

                        return redirect('/');
                    }
                }
            }
            session()->flash('error', 'Credential Mismatched.');
            return redirect('seller/login');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function manageProfile(Request $request) {

        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $countrys = Country::All();
        $cities = City::All();
        $country = Country::where('id',$seller->country_code)->first();
        
        return view('seller.manage-profile',compact('seller','countrys','country','cities'));
    }

    public function updateProfile(Request $request) {

        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->country_code = $request->country_code;
        $seller->city = $request->city;
        $seller->zipcode = $request->zipcode;
        $seller->address = $request->address;
        $profile_image = $request->file('profile_image');

        if(isset($profile_image) && $profile_image != '') {

            $name = time().'.'.$profile_image->getClientOriginalExtension();
            $d_path = public_path('../storage/app/public/seller/profile_image');
            $profile_image->move($d_path,$name);
            $seller1="seller/profile_image/".$name;
            $seller->profile_image = $seller1;
        }
        $seller->update();

        session()->flash('type','message');
        session()->flash('message', 'Profile Updated Successfully.');

        return redirect('seller/manage-profile');
    }

    public function changePassword(Request $request) {

        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        return view('seller.changepassword',compact('seller'));
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

        if(Hash::check($request->old_password,Auth::guard('seller')->user()->password) == true) {

            if($request->new_password == $request->confirm_password) { 

                $seller = Seller::find(Auth::guard('seller')->user()->id);

                $seller->password = Hash::make($request->new_password);
                $seller->update();
                
                session()->flash('type','message');
                session()->flash('message', 'Password Reset Successfully.');
                auth()->guard('seller')->logout();
                return redirect('/seller/login');
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

    //Get city by Country
    public function getCityByCountryID(Request $request)  {

        $country_code = $request->country_code;
        $cities = City::where('country_id',$country_code)->get();

        $data['cities'] = $cities;

        return json_encode($data);exit;
    }

    // Social Login
    public function sellerGoogleLogin() {

        Session()->put('role_nm', 'seller');
        $url = config('global.url').'/login/google';
        return redirect($url);
    }

    public function sellerFacebookLogin() {

        Session()->put('role_nm', 'seller');
        $url = config('global.url').'/login/facebook';
        return redirect($url);
    }

    public function createPost() {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $category = Category::All();
        return view('seller.create-storage',compact('seller','category'));
    }

    public function getsecoundPost() {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $countrys = Country::All();

      return view('seller.create-storage-secound',compact('seller','countrys'));
    }

    public function getthirdPost() {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $amenities = Amenities::All();
      return view('seller.create-storage-third',compact('seller','amenities'));
    }

    public function getfinalPost() {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $amenities = Amenities::All();
      return view('seller.create-storage-final',compact('seller','amenities'));
    }

    public function secoundPost(Request $request) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = new Storage();
        $storage->seller_id = $seller->id;
        $storage->title = $request->title;
        $storage->slug = Str::slug($request->title ,'-');
        $storage->cat_id = $request->category;
        $category = Category::where('id',$storage->cat_id)->first();
        $storage->storage_type = $category->name;
        $storage->description = $request->description;
        $storage->save();

        $storage = Storage::orderby('id','desc')->first();

        return redirect('secound-post');
    }

    public function thirdPost(Request $request) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = Storage::orderby('id','desc')->first();
        $storage->country = $request->country;
        $storage->city = $request->city;
        $storage->address = $request->address;
        $storage->storage_no = $request->storage_no;
        $storage->zipcode = $request->zipcode;
        $storage->phone1 = $request->phone1;
        $storage->phone2 = $request->phone2;
        $storage->update();

        return redirect('third-post');
    }

    public function finalPost(Request $request) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = Storage::orderby('id','desc')->first();
        $storage->no_of_floors = $request->no_of_floors;
        $storage->size = $request->size;
        $storage->update();
        $news = $request->input('employee');
        $diamentions = $request->input('diamention');
        $inventorys = $request->input('inventory');
        $prices = $request->input('price');
        $surfaces = $request->input('surface');
        $amenities = $request->input('amenities');

            for($j=0; $j < count($diamentions); $j++){

                $storagevariant = new StorageVariant();
                $storagevariant->storage_id = $storage->id;
                $storagevariant->dimension = $request->diamention[$j];
                $storagevariant->inventory = $request->inventory[$j];
                $storagevariant->price = $request->price[$j];
                $storagevariant->surface = $request->surface[$j];
                $storagevariant->save();
            }

            for($a=0; $a < count($amenities); $a++){
                $storageamenities = new StorageAmenities();
                $storageamenities->storage_id = $storage->id;
                $storageamenities->amenities_id = $request->amenities[$a];
                $storageamenities->save();
            }
        return redirect('final-post');
    }

    public function uploadPost(Request $request) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $img1 = $request->img1;
        //echo $img1;exit;
        if($request->has('img1') && $request->img1 != '') {

                $image = $request->file('img1');
                $name = time().'1'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image1 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image1;
                $storageimage->image = $image1;
                $storageimage->save();
            }
            else {
                $img1 = NULL;
            }

            $img2 = $request->img2;
        if($request->has('img2') && $request->img2 != '') {

                $image = $request->file('img2');
                $name = time().'2'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image2 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image2;
                $storageimage->save();
            }
            else {
                $img2 = NULL;
            }

            $img3 = $request->img3;
        if($request->has('img3') && $request->img3 != '') {

                $image = $request->file('img3');
                $name = time().'3'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image3 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image3;
                $storageimage->save();
            }
            else {
                $img3 = NULL;
            }

            $img4 = $request->img4;
        if($request->has('img4') && $request->img4 != '') {

                $image = $request->file('img4');
                $name = time().'4'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image4 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image4;
                $storageimage->save();
            }
            else {
                $img4 = NULL;
            }

            $img5 = $request->img5;
        if($request->has('img5') && $request->img5 != '') {

                $image = $request->file('img5');
                $name = time().'5'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image5 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image5;
                $storageimage->save();
            }
            else {
                $img5 = NULL;
            }
            $storage = Storage::orderby('id','desc')->first();
            $storage->video_url = $request->url();
            $storage->update();
            return redirect('create-post');
    }

    public function storageList(Request $request) {

        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $storage = Storage::where('seller_id',$seller->id)->get();
        $main = Storage::where('seller_id',$seller->id)->first();
        $image = StorageImages::where('storage_id',$main->id)->first();
        $inquiry = BuyerInquiry::where('storage_id',$main->id)->count();
        return view('seller.myads', compact('storage','seller','image','inquiry'));
    }

    public function storageDeactivate(Request $request , $slug) {

        $storage = Storage::where('slug',$slug)->first();
        $storage->storage_status = 0;
        $storage->update();
   
        return redirect('/my-ads');
    }

    public function storageActivate(Request $request , $slug) {

        $storage = Storage::where('slug',$slug)->first();
        $storage->storage_status = 1;
        $storage->update();
   
        return redirect('/my-ads');
    }

    public function storageDelete(Request $request , $slug) {

        $storage = Storage::where('slug',$slug)->delete();

        return redirect('/my-ads');
    }

     public function storageEdit(Request $request , $slug) {

        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $category = Category::All();
        $storage = Storage::where('slug',$slug)->first();
        return view('seller.create-storage',compact('seller','category','storage'));
    }

    public function storageUpdate(Request $request , $slug) {
        
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $category = Category::All();
        $storage = Storage::where('slug',$slug)->first();
        $storage->seller_id = $seller->id;
        $storage->title = $request->title;
        $storage->slug = Str::slug($request->title ,'-');
        $storage->cat_id = $request->category;
        $category = Category::where('id',$storage->cat_id)->first();
        $storage->storage_type = $category->name;
        $storage->description = $request->description;
        $storage->update();

        return view('seller.create-storage-secound',compact('seller','category','storage'));
    }

    public function editsecoundPost($slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $storage = Storage::where('slug',$slug)->first();
        $countrys = Country::All();
        $cities = City::All();

      return view('seller.create-storage-secound',compact('seller','countrys','storage','cities'));
    }

    public function editthirdPost($slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $amenities = Amenities::All();
        $storage = Storage::where('slug',$slug)->first();
      return view('seller.create-storage-third',compact('seller','amenities','storage'));
    }

    public function editfinalPost($slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();
        $amenities = Amenities::All();
        $storage = Storage::where('slug',$slug)->first();
      return view('seller.create-storage-final',compact('seller','amenities','storage'));
    }

    public function updatesecoundPost(Request $request , $slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = Storage::where('slug',$slug)->first();
        $storage->seller_id = $seller->id;
        $storage->title = $request->title;
        $storage->slug = Str::slug($request->title ,'-');
        $storage->cat_id = $request->category;
        $category = Category::where('id',$storage->cat_id)->first();
        $storage->storage_type = $category->name;
        $storage->description = $request->description;
        $storage->update();

        $storage = Storage::orderby('id','desc')->first();

        return redirect('secound-post/{$slug}');
    }

    public function updatethirdPost(Request $request , $slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = Storage::where('slug',$slug)->first();
        $storage->country = $request->country;
        $storage->city = $request->city;
        $storage->address = $request->address;
        $storage->storage_no = $request->storage_no;
        $storage->zipcode = $request->zipcode;
        $storage->phone1 = $request->phone1;
        $storage->phone2 = $request->phone2;
        $storage->update();

        return redirect('third-post');
    }

    public function updatefinalPost(Request $request , $slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $storage = Storage::where('slug',$slug)->first();
        $storage->no_of_floors = $request->no_of_floors;
        $storage->size = $request->size;
        $storage->update();
        $news = $request->input('employee');
        $diamentions = $request->input('diamention');
        $inventorys = $request->input('inventory');
        $prices = $request->input('price');
        $surfaces = $request->input('surface');
        $amenities = $request->input('amenities');

            for($j=0; $j < count($diamentions); $j++){

                $storagevariant = new StorageVariant();
                $storagevariant->storage_id = $storage->id;
                $storagevariant->dimension = $request->diamention[$j];
                $storagevariant->inventory = $request->inventory[$j];
                $storagevariant->price = $request->price[$j];
                $storagevariant->surface = $request->surface[$j];
                $storagevariant->save();
            }

            for($a=0; $a < count($amenities); $a++){
                $storageamenities = new StorageAmenities();
                $storageamenities->storage_id = $storage->id;
                $storageamenities->amenities_id = $request->amenities[$a];
                $storageamenities->save();
            }
        return redirect('final-post');
    }

    public function updateuploadPost(Request $request , $slug) {
        $seller_id = Auth::guard('seller')->user()->id;
        $seller = Seller::where('id',$seller_id)->first();

        $img1 = $request->img1;
        //echo $img1;exit;
        if($request->has('img1') && $request->img1 != '') {

                $image = $request->file('img1');
                $name = time().'1'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image1 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image1;
                $storageimage->image = $image1;
                $storageimage->save();
            }
            else {
                $img1 = NULL;
            }

            $img2 = $request->img2;
        if($request->has('img2') && $request->img2 != '') {

                $image = $request->file('img2');
                $name = time().'2'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image2 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image2;
                $storageimage->save();
            }
            else {
                $img2 = NULL;
            }

            $img3 = $request->img3;
        if($request->has('img3') && $request->img3 != '') {

                $image = $request->file('img3');
                $name = time().'3'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image3 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image3;
                $storageimage->save();
            }
            else {
                $img3 = NULL;
            }

            $img4 = $request->img4;
        if($request->has('img4') && $request->img4 != '') {

                $image = $request->file('img4');
                $name = time().'4'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image4 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image4;
                $storageimage->save();
            }
            else {
                $img4 = NULL;
            }

            $img5 = $request->img5;
        if($request->has('img5') && $request->img5 != '') {

                $image = $request->file('img5');
                $name = time().'5'.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('../storage/app/public/storages');
                $image->move($destinationPath, $name);
                $image5 = 'storages/'.$name;

                $storage = Storage::orderby('id','desc')->first();
                $storageimage = new StorageImages();
                $storageimage->storage_id = $storage->id;
                $storageimage->image = $image5;
                $storageimage->save();
            }
            else {
                $img5 = NULL;
            }
            $storage = Storage::orderby('id','desc')->first();
            $storage->video_url = $request->url();
            $storage->update();
            return redirect('create-post');
    }

}