<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

                // Get New Launched Storages
                $new_launched_projects = self::getNewLaunchedProjects($category_id,9);

                return view('index',compact('new_launched_projects','categories','banners','category_id'));
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

                return view('seller.home',compact('categories','seller','seller_id','seller_storages','category_id','order_list','order_name'));
            }
            else if(auth()->guard('buyer')->user() != '') {

                $buyer_id = Auth::guard('buyer')->user()->id;
                $buyer = Buyer::where('id',$buyer_id)->first();

                // Get New Launched Storages
                $new_launched_projects = self::getNewLaunchedProjects($category_id,9);

                return view('buyer.home',compact('buyer','buyer_id','new_launched_projects','recommended_posts','categories','cities_list','city_name','banners','search_txt','category_id','min_price','max_price','min_area','max_area','bhk_no','amenities'));
            }
        }
        catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}