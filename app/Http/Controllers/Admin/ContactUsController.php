<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index(Request $request) {

        $contact_us = ContactUs::orderBy('id','desc')->get();
        $count = sizeof($contact_us);

        return view('admin.contact-us.list',compact('contact_us','count'));
    }

    public function contactUsDetails(Request $request ,$id) {

        $contact_us = ContactUs::where('id',$id)->first();

        return view('admin.contact-us.details',compact('contact_us'));
    }
}