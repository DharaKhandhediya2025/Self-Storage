<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index(Request $request) {

        $data = AboutUs::first();
        return view('admin.cms.aboutus',compact('data'));
    }
    
    public function addUpdate(Request $request) {

        $messages = [
            'description.required' => 'Description is Required.',
        ];

        $request->validate([
            'description' => 'required',
        ],$messages);

        $get_details = AboutUs::first();

        if(isset($get_details) && $get_details != '') {

            $details = AboutUs::find($get_details->id);
            $details->description = $request->description;
            $details->save();
            
            session()->flash('type','message');
            session()->flash('message', 'Details Updated Successfully.');

            return redirect()->route('admin.aboutus');
        }
        else {

            $details = new AboutUs();
            $details->description = $request->description;
            $details->save();
            
            session()->flash('type','message');
            session()->flash('message', 'Details Added Successfully.');

            return redirect()->route('admin.aboutus');
        }
    }
}