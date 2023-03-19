<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyerInquiry;

class BuyerInquiryController extends Controller
{
    public function getBuyerInquires(Request $request) {

        if(isset($request->start_date) && isset($request->end_date)) {
            
            $buyer_inquiry = BuyerInquiry::with('storage_details')->whereDate('created_at','>=',$request->start_date)->whereDate('created_at','<=',$request->end_date)->orderBy('id','desc')->get();
        }
        else {
            $buyer_inquiry = BuyerInquiry::with('storage_details')->orderBy('id','desc')->get();
        }
        $count = sizeof($buyer_inquiry);

        return view('admin.buyer-inquiry.list', compact('buyer_inquiry','count'));
    }

    public function buyerInquiryDetails(Request $request ,$id) {

        $buyer_inquiry = BuyerInquiry::with('storage_details')->where('id',$id)->first();

        return view('admin.buyer-inquiry.details',compact('buyer_inquiry'));
    }
}