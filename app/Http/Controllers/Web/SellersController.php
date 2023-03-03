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
}