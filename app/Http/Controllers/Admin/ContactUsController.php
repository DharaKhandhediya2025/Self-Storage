<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index(Request $request) {

        $data = ContactUs::first();
        return view('admin.contactus',compact('data'));
    }
    
    public function addUpdate(Request $request) {

        $messages = [
            
            'email.required' => 'Email is Required.',
            'phone.required' => 'Phone is Required.',
            'description.required' => 'Description is Required.',
        ];

        $request->validate([

            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ],$messages);

        $get_details = ContactUs::first();

        if(isset($get_details) && $get_details != '') {

            $details = ContactUs::find($get_details->id);
            $details->email = $request->email;
            $details->phone = $request->phone;
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Contact Details Updated Successfully.');
            
            return redirect()->route('admin.contactus');
        }
        else {

            $details = new ContactUs();
            $details->email = $request->email;
            $details->phone = $request->phone;
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Contact Details Added Successfully.');
            
            return redirect()->route('admin.contactus');
        }
    }
}