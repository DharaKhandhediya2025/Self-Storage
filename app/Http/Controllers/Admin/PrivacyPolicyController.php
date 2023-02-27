<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index(Request $request) {

        $data = PrivacyPolicy::first();
        return view('admin.privacy-policy',compact('data'));
    }
    
    public function addUpdate(Request $request) {

        $messages = [
            'description.required' => 'Description is Required.',
        ];

        $request->validate([
            'description' => 'required',
        ],$messages);

        $get_details = PrivacyPolicy::first();

        if(isset($get_details) && $get_details != '') {

            $details = PrivacyPolicy::find($get_details->id);
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Details Updated Successfully.');
            
            return redirect()->route('admin.privacy');
        }
        else {

            $details = new PrivacyPolicy();
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Details Added Successfully.');
            
            return redirect()->route('admin.privacy');
        }
    }
}