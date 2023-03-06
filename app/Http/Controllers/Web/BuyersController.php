<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebController;
use Illuminate\Http\Request;
use App\Models\{Buyer,Seller,Storage,FavoriteStorage,Country,Category,StorageRating,Inquiry,Chat};
use Illuminate\Support\Facades\{Auth,Hash};
use DB,Session;
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

        return view('buyer.manage-profile',compact('buyer'));
    }

    public function updateProfile(Request $request) {

        $buyer_id = Auth::guard('buyer')->user()->id;
        $buyer = Buyer::where('id',$buyer_id)->first();

        $buyer->name = $request->name;
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
}