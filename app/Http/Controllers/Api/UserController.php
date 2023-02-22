<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Users};
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\{DB,Validator,Hash};
use Illuminate\Support\Str;

class UserController extends Controller
{
    use ApiResponser;
    private $token;

    public function __construct() {
        $this->token = uniqid(base64_encode(Str::random(10)));
    }

    public function register(Request $request) {

        try {

            $user = new Users();
            $user->firebase_uid = $request->firebase_uid;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->country_code = $request->country_code;
            $user->city_code = $request->city_code;
            $user->profile_image = $request->profile_image;
            $user->otp = rand(1000,9999);
            $user->otp_verify = 'N';
            $user->fcm_token = $request->fcm_token;
            $user->custom_token = $this->token;
            $user->save();
            
            $user_details = Users::where('id','=',$user->id)->first();

            // Send OTP
            /*$input['user_details'] = $user_details;

            \Mail::send('emails.buyerSellerOTP', $input, function ($message) use($input) {
                $message->to($input['email'])->subject('Dynasty-Verification Code');
            });*/

            if($user_details) {
                return $this->success($user_details,'Registered Success',200);
            }
            return $this->error("Fail to register",500,'single-arr');
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(),500,'single-arr');
        }
    }

    public function login(Request $request) {

        try {

            $validator = Validator::make($request->all(), [

                'country_id' => 'required',
                'country_code' => 'required',
                'phone' => 'required'
            ]);
            
            if ($validator->fails()) {
                return $this->error($validator->errors(),500,'single-arr');
            }

            $checkMobile = Users::where('phone',$request->phone)->count();

            if($checkMobile > 0) {
                return $this->error('Mobile No. is already exists. Please try with another No.',500,'single-arr');
            }
            
            $user = Users::where('phone',$request->phone)->where('country_id',$request->country_id)->first();

            if(isset($user)) {

                if($user->status == 1) {

                    $user->update(['fcm_token' => $request->fcm_token]);
                    return $this->success($user,'Login Success',200);
                }
                else if($user->status == 0) {
                    return $this->error('You are currently blocked.',500,'single-arr');
                }
            }
            else {

                $user = new Users();
                $user->country_id = $request->country_id;
                $user->country_code = $request->country_code;
                $user->phone = $request->phone;
                $user->otp = rand(1000,9999);
                $user->otp_verify = 'N';
                $user->fcm_token = $request->fcm_token;
                $user->custom_token = $this->token;
                $user->save();
                
                $user_details = Users::where('id','=',$user->id)->first();

                // Send OTP
                $mobile_no = $user_details->country_code.$user_details->phone;

                $sendSms = $this->sendSms($mobile_no,$user_details->otp);

                if($sendSms) {
                    return $this->success($user_details,'OTP Sent Successfully.',200);
                }
                return $this->error("Fail to Register.",500,'single-arr');
            }
            return $this->error('Something went wrong.',500,'single-arr');
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(),500,'single-arr');
        }
    }

    public function verifyOTP(Request $request) {

        try {

            $validator = Validator::make($request->all(), [

                'phone' => 'required',
                'otp' => 'required|numeric'
            ]);
            
            if ($validator->fails()) {
                return $this->error($validator->errors(),500,'single-arr');
            }
            
            $checkUser = Users::where(['phone' => $request->phone,'otp' => $request->otp])->first();

            if($checkUser) {

                $input['fcm_token'] = ($request->fcm_token != '') ? $request->fcm_token : $checkUser->fcm_token;
                $input['otp_verify'] = 'Y';

                $update = Users::where('phone',$request->phone)->update($input);

                $user = Users::where('id',$checkUser->id)->first();
                return $this->success($user,'OTP Verify Success.',200);
            }
            return $this->error('OTP Mismatched.',500,'single-arr');
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(),500,'single-arr');
        }
    }

    public function resendOTP(Request $request) {

        try {

            $validator = Validator::make($request->all(), [
                'phone' => 'required'
            ]);
            
            if ($validator->fails()) {
                return $this->error($validator->errors(),500,'single-arr');
            }
            
            $checkUser = Users::where(['phone' => $request->phone])->first();

            if($checkUser) {

                $checkUser->otp = rand(1000,9999);
                $checkUser->otp_verify = 'N';
                $checkUser->save();

                $user_details = Users::where('id',$checkUser->id)->first();

                // Send OTP
                $mobile_no = $user_details->country_code.$user_details->phone;

                $sendSms = $this->sendSms($mobile_no,$user_details->otp);

                if($sendSms) {
                    return $this->success($user_details,'OTP Sent Successfully.',200);
                }
            }
            return $this->error('OTP Not Sent.',500,'single-arr');
        }
        catch(\Exception $e) {
            return $this->error($e->getMessage(),500,'single-arr');
        }
    }

    public function editUserProfile(Request $request) {

         try {

            $token = $request->header('custom-token');
            $user_id = Users::checkauth($token);

            if(!$token || $user_id == '0') {
                return $this->error('Unauthorized!.',500,'single-arr');   
            }

            $user = Users::where('id',$user_id)->first();
            
            if(isset($user)) {

                if($request->has('profile_image') && $request->profile_image != '') {

                    $image = $request->file('profile_image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('../storage/app/public/user/profile_image');
                    $image->move($destinationPath, $name);
                    $profile_image = 'user/profile_image/'.$name;
                }
                else {
                    $profile_image = NULL;
                }

                // Save Updated Data
                $user->name = ($request->name == '' ? $user->name : $request->name);
                $user->email  = ($request->email == '' ? $user->email : $request->email);
                $user->address  = ($request->address == '' ? $user->address : $request->address);
                $user->profile_image = ($profile_image == '' ? $user->profile_image : $profile_image);
                $user->country_id  = ($request->country_id == '' ? $user->country_id : $request->country_id);
                $user->city_id = ($request->city_id == '' ? $user->city_id : $request->city_id);
                $user->save();

                return $this->success($user,'User Profile Updated Successfully.',200);
            }
            else {
                return $this->error('Something went wrong.',500,'single-arr');
            }
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage(),500,'single-arr');
        }
    }
}