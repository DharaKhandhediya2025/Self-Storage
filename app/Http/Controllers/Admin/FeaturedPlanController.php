<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedPlan;

class FeaturedPlanController extends Controller
{
    public $start_date = '';
    public $end_date = '';

    public function index(Request $request) {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if(isset($start_date) && isset($end_date)) {
            
            $featured_plans = FeaturedPlan::where('created_at','>=',$start_date)->where('created_at','<=',$end_date)->orderBy('id','desc')->get();
        }
        else {
            $featured_plans = FeaturedPlan::orderBy('id','desc')->get();
        }

        $count = sizeof($featured_plans);

        return view('admin.featured-plan',compact('featured_plans','count'));
    }

    public function addUpdateFeaturedPlan(Request $request ,$id=false) {

        $storage_type = FeaturedPlan::getStorageType();
        $duration_list = FeaturedPlan::getDurationList();

        $featured_plans = new FeaturedPlan();

        if($id) {
            $featured_plans = FeaturedPlan::where('id','=',$id)->firstOrFail();
        }
        return view('admin.addUpdateFeaturedPlan',compact('featured_plans','duration_list','storage_type'));
    }

    public function saveFeaturedPlan(Request $request) {

        $id = $request->get('id');
        $featured_plans = FeaturedPlan::find($id);

        if($request->type == 'Single') {

            $messages = [

                'type.required' => 'Type is required field.',
                'price.required' => 'Price is required field.',
                'validity.required' => 'Validity is required field.',
                'duration.required' => 'Duration is required field.',
            ];
                
            $this->Validate($request,[

                'type' => 'required',
                'price' => 'required',
                'validity' => 'required',
                'duration' => 'required',
            ],$messages);
        }
        else {

            $messages = [

                'type.required' => 'Type is required field.',
                'total_storage.required' => 'No. of Storage is required field.',
                'price.required' => 'Price is required field.',
                'validity.required' => 'Validity is required field.',
                'duration.required' => 'Duration is required field.',
            ];
                
            $this->Validate($request,[

                'type' => 'required',
                'total_storage' => 'required',
                'price' => 'required',
                'validity' => 'required',
                'duration' => 'required',
            ],$messages);
        }

        if(empty($featured_plans)) {

            FeaturedPlan::create([

                'type' => $request->type,
                'total_storage' => $request->total_storage,
                'price' => $request->price,
                'validity' => $request->validity,
                'duration' => $request->duration,
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Featured Plan Added Successfully.');
    
            return redirect('admin/featured-plan');
        }
        else {
            
            $featured_plans->type = $request->type;

            if($request->type == 'Multiple') {
                $featured_plans->total_storage = $request->total_storage;
            }
            else {
                $featured_plans->total_storage = NULL;
            }
            $featured_plans->price = $request->price;
            $featured_plans->validity = $request->validity;
            $featured_plans->duration = $request->duration;
            $featured_plans->save();

            session()->flash('type','message');
            session()->flash('message', 'Featured Plan Updated Successfully.');

            return redirect('admin/featured-plan');
        }
    }

    public function deleteFeaturedPlan($id) {

        $featured_plans = FeaturedPlan::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Featured Plan Deleted Successfully.');

        return redirect('admin/featured-plan');
    }
}