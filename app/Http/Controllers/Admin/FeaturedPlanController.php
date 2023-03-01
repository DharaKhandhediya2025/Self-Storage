<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedPlan;
use App\Models\FeaturedPlanFunctionality;

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

        return view('admin.featured-plan.featured-plan',compact('featured_plans','count'));
    }

    public function addUpdateFeaturedPlan(Request $request ,$id=false) {

        $plan_type = FeaturedPlan::getPlanType();
        $duration_list = FeaturedPlan::getDurationList();

        $featured_plans = new FeaturedPlan();

        if($id) {
            $featured_plans = FeaturedPlan::where('id','=',$id)->firstOrFail();
        }
        return view('admin.featured-plan.add-update-featured-plan',compact('featured_plans','duration_list','plan_type'));
    }

    public function saveFeaturedPlan(Request $request) {

        $id = $request->get('id');
        $featured_plans = FeaturedPlan::find($id);

        $messages = [

            'type.required' => 'Type is Required Field.',
            'price.required' => 'Price is Required Field.',
            'validity.required' => 'Validity is Required Field.',
            'duration.required' => 'Duration is Required Field.',
        ];
            
        $this->Validate($request,[

            'type' => 'required',
            'price' => 'required',
            'validity' => 'required',
            'duration' => 'required',
        ],$messages);

        if(empty($featured_plans)) {

            $featured_plans = new FeaturedPlan();
            $featured_plans->type = $request->type;
            $featured_plans->price = $request->price;
            $featured_plans->validity = $request->validity;
            $featured_plans->duration = $request->duration;
            $featured_plans->save();

            $functionality = $request->functionality;

            if(isset($functionality) && $functionality != '') {

                $fp_id = $featured_plans->id;

                for($j = 0; $j < count($functionality); $j++) {

                    $fp_functionality = new FeaturedPlanFunctionality();
                    $fp_functionality->featured_plan_id = $fp_id;
                    $fp_functionality->functionality = $functionality[$j];
                    $fp_functionality->save();
                }
            }

            session()->flash('type','message');
            session()->flash('message', 'Featured Plan Added Successfully.');
    
            return redirect('admin/featured-plan');
        }
        else {
            
            $featured_plans->type = $request->type;
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