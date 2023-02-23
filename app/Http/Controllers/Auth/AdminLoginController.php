<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash,DB,Auth};
use App\Models\Admin;

class AdminLoginController extends Controller
{
    protected $guard = 'admin';
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct() {
        // $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm() {

        if (auth()->guard('admin')->user() != '') {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = auth()->guard('admin')->user();
            return redirect('/admin/dashboard');
        }
        
        $request->session()->flash('fail', 'Email or password are wrong.');
        $request->session()->flash('class', 'red');
        return back();
    }

    public function sendOTP(Request $request) {

        $email = $request->email;
        $admin_details = Admin::where('email',$email)->first();

        if(isset($admin_details) && $admin_details != '') {

            $admin_details->otp = rand(1000,9999);
            $admin_details->otp_verify = 'N';
            $admin_details->save();

            $from_name = getenv('MAIL_FROM_NAME');
            $from_address = getenv('MAIL_FROM_ADDRESS');
            $app_url = getenv('APP_URL');

            $input['from_name'] = $from_name;
            $input['from_address'] = $from_address;
            $input['app_url'] = $app_url;

            $input['name'] = $admin_details->name;
            $input['otp'] = $admin_details->otp;
            $input['email'] = $email;

            // Send OTP over mail
            \Mail::send('emails.buyerSellerOTP', $input, function ($message) use ($input) {
                $message->from($input['from_address'], $input['from_name']);
                $message->to($input['email'])->subject('RBS Care-Verification Code');
            });

            session(['email' => $email]);
            return redirect('/admin/verify-otp');
        }
        else {

            $request->session()->flash('fail', 'Please Enter Correct Email.');
            $request->session()->flash('class', 'red');
            return back();
        }
    }

    public function saveVerifyOTP(Request $request) {

        $digit1 = $request->digit1;
        $digit2 = $request->digit2;
        $digit3 = $request->digit3;
        $digit4 = $request->digit4;
        $otp = $digit1.$digit2.$digit3.$digit4;

        $email = $request->email;
        $admin_details = Admin::where('email',$email)->first();

        if(isset($admin_details) && $admin_details != '') {

            $get_otp = $admin_details->otp;

            if($get_otp == $otp) {

                $admin_details->otp_verify = 'Y';
                $admin_details->save();
                
                session(['email' => $email]);
                return redirect('/admin/reset-password');
            }
            else {

                session(['email' => $email]);
                $request->session()->flash('fail', 'OTP Mismatched.');
                $request->session()->flash('class', 'red');
                return back();
            }
        }
        else {

            session(['email' => $email]);
            $request->session()->flash('fail', 'OTP Mismatched.');
            $request->session()->flash('class', 'red');
            return back();
        }
    }

    public function setPassword(Request $request) {

        $email = $request->email;
        $admin_details = Admin::where('email',$email)->first();

        $password = $request->pwd;
        $confirm_password = $request->confirm_pwd;

        if(isset($admin_details) && $admin_details != '') {

            if($password == $confirm_password) {

                $admin_details->password = Hash::make($password);
                $admin_details->save();
                
                session(['email' => $email]);
                return redirect('/admin/reset-success');
            }
            else {

                session(['email' => $email]);
                $request->session()->flash('fail', 'Password are Mismatched.');
                $request->session()->flash('class', 'red');
                return back();
            }
        }
        else {

            session(['email' => $email]);
            $request->session()->flash('fail', 'Password are Mismatched.');
            $request->session()->flash('class', 'red');
            return back();
        }
    }

    public function logout(Request $request) {

        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }
}