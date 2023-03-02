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
            $country_details = Country::where('dial_code','=',$country_code)->first();

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

            session()->flash('success', 'Registered Successfully.');

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
            $data['name'] = $name;
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
            }

            return redirect('/verify-otp');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}