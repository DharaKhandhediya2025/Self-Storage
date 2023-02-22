<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\{Hash,DB,Auth};
use App\Models\{Buyer,Seller};

class AdminController extends Controller
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
            $request->session()->flash('message', 'Login Successfully');
            $request->session()->flash('class', 'green');
            return redirect('/admin/dashboard');
        }
        
        $request->session()->flash('fail', 'Email or password are wrong.');
        $request->session()->flash('class', 'red');
        return back();
    }

    public function checkEmail(Request $req) {

        $check_data = DB::table('admins')->where('email',$req->email)->first();

        if(isset($check_data)) {
            return redirect('reset-password');
        }
        else {
            $req->session()->flash('message', 'Email ID is wrong');
            $req->session()->flash('class', 'red');
            return redirect('forgot-password');
        }
    }

    public function resetPassword(Request $req) {

        $update_data = DB::table('admins')->update(array('password'=>Hash::make($req->password)));

        if($update_data) {
            return redirect('admin/login');
        }
        else {
            return redirect('forgot-password');
        }
    }

    public function logout(Request $request) {

        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }

    public function dashboard() {

        $buyers = Buyer::orderBy('id','desc')->get()->count();
        $sellers = Seller::orderBy('id','desc')->get()->count();

        return view('admin.dashboard',compact('buyers','sellers'));
    }

    public function dashboardDatewise() {

        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        // Get Total Count of Buyers & Sellers
        $buyers = Buyer::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();
        $sellers = Seller::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $data['buyers'] = $buyers;
        $data['sellers'] = $sellers;

        return json_encode($data);
    }

    public function changePassword(Request $request) {
        
        return view('admin.changepassword');
    }
    
    public function updatePassword(Request $request) {

        $messages = [

            'old_password.required' => 'Old Password is Required.',
            'new_password.required' => 'New Password is Required.',
            'confirm_password.required' => 'Confirm Password is Required.',
        ];

        $validator = $this->validate($request, [

            'old_password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ],$messages);

        if(Hash::check($request->old_password,Auth::guard('admin')->user()->password) == true) {

            if($request->new_password == $request->confirm_password) { 

                $admin = Admin::find(Auth::guard('admin')->user()->id);

                $admin->password = Hash::make($request->new_password);
                $admin->update();
                
                session()->flash('type','message');
                session()->flash('message', 'Password Reset Successfully.');
                return redirect()->route('admin.changepassword');
            }
            else {

                session()->flash('fail', 'New Password and Confirm Password are not match.');
                return redirect()->route('admin.changepassword');
            }
        }
        else {

            session()->flash('fail', 'Current Password are not correct.Please try again.');
            return redirect()->route('admin.changepassword');
        }
    }
}