<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{AboutUs,ContactUs,FAQ,PrivacyPolicy,TermsCondition,Buyer,Seller,Storage,Category,Amenities,Banners,FavoriteStorage,Country,Subscribers};
use Illuminate\Support\Facades\{Auth,Hash};

class WebController extends Controller
{
    public function index() {

        try {

            // Get Banners
            $banners = Banners::get();

            // Get all filtered values
            if(isset($_POST['category_id']) && $_POST['category_id'] != '') {
                $category_id = $_POST['category_id'];
            }
            else {
                $category_id = '';
            }

            // Checked Order is selected or not for seller type
            if(isset($_POST['order_name']) && $_POST['order_name'] != '') {
                $order_name = $_POST['order_name'];
            }
            else {
                $order_name = '';
            }

            // Get Categories
            $categories = Category::get();

            if(auth()->guard('buyer')->user() == '' && auth()->guard('seller')->user() == '') {

                return view('index');
            }
            else if(auth()->guard('seller')->user() != '') {

                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();
                $today_date = date('Y-m-d');

                // Return response
                $query = Storage::with(['storage_image','category']);

                $query->withCount(['featured_storage' => function($query1) use($seller_id,$today_date) {
                
                    $query1->where('seller_id',$seller_id);
                    $query1->where('expired_date','>=',$today_date);
                }]);


                if($category_id > 0) {
                    $query = $query->where('post.cat_id','=',$category_id);
                }

                if(isset($order_name) && $order_name != '') {

                    if($order_name == 'New') {
                        $query = $query->orderBy('id','desc');
                    }
                    else if($order_name == 'Old') {
                        $query = $query->orderBy('id','asc');
                    }
                    else if($order_name == 'Alpha') {
                        $query = $query->orderBy('title','asc');
                    }
                }
                else {
                    $query = $query->orderBy('id','desc');
                }

                $seller_storages = $query->where('seller_id',$seller_id)->get();

                // Order List

                $order_list = array();
                $order_list['New'] = "New First";
                $order_list['Old'] = "Old First";
                $order_list['Alpha'] = "Alphabetical(A-Z)";

                return view('seller.home',compact('categories','seller','seller_id','seller_storages','category_id','order_list','order_name','banners'));
            }
            else if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                // Get New Launched Storages
                //$new_launched_projects = self::getNewLaunchedProjects($category_id,9);

                return view('buyer.home',compact('categories','buyer','buyer_id','category_id','banners'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function subscribeNewsletter() {

        $email = $_GET['email'];

        $subscriber_details = Subscribers::where('email','=',$email)->first();

        if(isset($subscriber_details) && $subscriber_details != '') {

            $msg = "You are already subscribed.";
            return json_encode($msg);exit;
        }
        else {

            $add = new Subscribers();
            $add->email = $email;
            $add->save();

            $msg = "Subscribed.";
            return json_encode($msg);exit;
        }
    }

    public function aboutUs() {

        try {
            if(auth()->guard('buyer')->user() != '') {
                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();
                $about_us = AboutUs::first();
                return view('about-us',compact('about_us','buyer'));
            }

            if(auth()->guard('seller')->user() != '') {
                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();
                $about_us = AboutUs::first();
                return view('about-us',compact('about_us','seller'));
            }

            else{
                $about_us = AboutUs::first();
                return view('about-us',compact('about_us'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function contactUs() {

        try {
            if(auth()->guard('buyer')->user() != '') {
                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();
                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us','buyer'));
            }

            elseif(auth()->guard('seller')->user() != '') {
                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();
                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us','seller'));
            }

            else{
                $about_us = AboutUs::first();
                return view('contact-us',compact('about_us'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function contactInquiry(Request $request) {

        try {

            $contact_us = new ContactUs();  
            $contact_us->name = $request->name;
            $contact_us->email = $request->email;
            $contact_us->subject = $request->subject;
            $contact_us->message = $request->message;
            $contact_us->save();

            session()->flash('type','message');
            session()->flash('message', 'Contact Inquiry Submitted Successfully.');
            return redirect('/contact-us');
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function faqList() {

        try {

            $faq_list = FAQ::get();
            return view('faq-list',compact('faq_list'));
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function privacyPolicy() {

        try {

            $privacy_policy = PrivacyPolicy::first();
            return view('privacy-policy',compact('privacy_policy'));
          
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function termsCondition() {

        try {
            if(auth()->guard('buyer')->user() != '') {
                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();
                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition' , 'buyer'));
            }

            if(auth()->guard('seller')->user() != '') {
                $seller_id = Auth::guard('seller')->user()->id;
                $seller = Seller::where('id',$seller_id)->first();
                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition' , 'seller'));
            }

            else{
                $terms_condition = TermsCondition::first();
                return view('terms-condition',compact('terms_condition'));
            }
    
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}