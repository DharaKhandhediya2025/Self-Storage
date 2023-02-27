<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsCondition;

class TermsConditionController extends Controller
{
    public function index(Request $request) {

        $data = TermsCondition::first();
        return view('admin.terms-condition',compact('data'));
    }
    
    public function addUpdate(Request $request) {

        $messages = [
            'description.required' => 'Description is Required.',
        ];

        $request->validate([
            'description' => 'required',
        ],$messages);

        $get_details = TermsCondition::first();

        if(isset($get_details) && $get_details != '') {

            $details = TermsCondition::find($get_details->id);
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Details Updated Successfully.');
            
            return redirect()->route('admin.terms');
        }
        else {

            $details = new TermsCondition();
            $details->description = $request->description;
            $details->save();

            session()->flash('type','message');
            session()->flash('message', 'Details Added Successfully.');
            
            return redirect()->route('admin.terms');
        }
    }
}