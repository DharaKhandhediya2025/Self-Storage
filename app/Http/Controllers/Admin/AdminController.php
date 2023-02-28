<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\{Hash,DB,Auth};
use App\Models\{Buyer,Seller,Admin,Storage,FeaturedPlan,Inquiry};
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected $guard = 'admin';
    use AuthenticatesUsers;

    public function dashboard() {

        $buyers = Buyer::orderBy('id','desc')->get()->count();
        $sellers = Seller::orderBy('id','desc')->get()->count();
        $storages = Storage::orderBy('id','desc')->get()->count();
        $featured_plans = FeaturedPlan::orderBy('id','desc')->get()->count();
        $inquiry = Inquiry::orderBy('id','desc')->get()->count();

        return view('admin.dashboard',compact('buyers','sellers','storages','featured_plans','inquiry'));
    }

    public function dashboardDatewise() {

        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        // Get Total Count By Date
        $buyers = Buyer::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $sellers = Seller::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $storages = Storage::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $featured_plans = FeaturedPlan::whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $inquiry = Inquiry::with(['buyers_details','storage_details'])->whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$to_date)->count();

        $data['buyers'] = $buyers;
        $data['sellers'] = $sellers;
        $data['storages'] = $storages;
        $data['featured_plans'] = $featured_plans;
        $data['inquiry'] = $inquiry;

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
            'new_password' => 'required',
            'confirm_password' => 'required',
        ],$messages);

        if(Hash::check($request->old_password,Auth::guard('admin')->user()->password) == true) {

            if($request->new_password == $request->confirm_password) { 

                $admin = Admin::find(Auth::guard('admin')->user()->id);

                $admin->password = Hash::make($request->new_password);
                $admin->update();
                
                session()->flash('type','message');
                session()->flash('message', 'Password Reset Successfully.');
                auth()->guard('admin')->logout();
                return redirect('admin/login');
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

    public function getSellers(Request $request) {

        if(isset($request->start_date) && isset($request->end_date)) {
            
            $sellers = Seller::whereDate('created_at','>=',$request->start_date)->whereDate('created_at','<=',$request->end_date)->orderBy('id','desc')->get();
        }
        else {
            $sellers = Seller::orderBy('id','desc')->get();
        }
        $count = sizeof($sellers);

        return view('admin.seller-list', ['sellers' => $sellers,'count' => $count]);
    }

    public function getStorages(Request $request) {

        if(isset($request->start_date) && isset($request->end_date)) {
            
            $storages = Storage::whereDate('created_at','>=',$request->start_date)->whereDate('created_at','<=',$request->end_date)->orderBy('id','desc')->get();
        }
        else {
            $storages = Storage::orderBy('id','desc')->get();
        }
        $count = sizeof($storages);

        return view('admin.storage.list', ['storages' => $storages,'count' => $count]);
    }

    public function getPropertyDetailsByID($slug) {

        $storages = Storage::with(['storage_amenities' => function($sql) {
            
            $sql->with(['amenities_detail' => function($query) {
                $query->select('id','name');
            }]);

        }])->with(['seller','category','sub_category','storage_image'])->where('slug',$slug)->first();

        return view('admin.storage.details',compact('storages'));
    }

    public function getBuyers(Request $request) {

        if(isset($request->start_date) && isset($request->end_date)) {
            
            $buyers = Buyer::whereDate('created_at','>=',$request->start_date)->whereDate('created_at','<=',$request->end_date)->orderBy('id','desc')->get();
        }
        else {
            $buyers = Buyer::orderBy('id','desc')->get();
        }
        $count = sizeof($buyers);

        return view('admin.buyer-list', ['buyers' => $buyers,'count' => $count]);
    }

    public function getBuyerInquires(Request $request) {

        if(isset($request->start_date) && isset($request->end_date)) {
            
            $inquiry = Inquiry::with(['buyers_details','storage_details'])->whereDate('created_at','>=',$request->start_date)->whereDate('created_at','<=',$request->end_date)->orderBy('id','desc')->get();
        }
        else {
            $inquiry = Inquiry::with(['buyers_details','storage_details'])->orderBy('id','desc')->get();
        }
        $count = sizeof($inquiry);

        return view('admin.buyer-inquiry', ['inquiry' => $inquiry,'count' => $count]);
    }

    public function updateSellerStatus() {

        $id = $_GET['seller_id'];

        $seller = Seller::find($id);
        $status = $seller->active_block_status;

        if($status == 1) {
            $seller->active_block_status = 0;
        }
        else {
            $seller->active_block_status = 1;
        }
        $seller->save();

        $response['message'] = 'Status Updated Successfully.';
        return json_encode($response);
    }

    public function updateBuyerStatus() {

        $id = $_GET['buyer_id'];

        $buyer = Buyer::find($id);
        $status = $buyer->active_block_status;

        if($status == 1) {
            $buyer->active_block_status = 0;
        }
        else {
            $buyer->active_block_status = 1;
        }
        $buyer->save();

        $response['message'] = 'Status Updated Successfully.';
        return json_encode($response);
    }
}