<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Features;

class FeaturesController extends Controller
{
    public function index() {

        $features = Features::orderBy('id','desc')->get();
        $count = sizeof($features);

        return view('admin.features.index',compact('features','count'));
    }

    public function addUpdateFeatures(Request $request ,$id=false) {

        $features = new Features();

        if($id) {
            $features = Features::where('id','=',$id)->firstOrFail();
        }
        return view('admin.features.add-update-features',compact('features'));
    }

    public function saveFeatures(Request $request) {

        $id = $request->get('id');
        $features = Features::find($id);

        $messages = [
            'name.required' => 'Feature Name is Required.',
        ];
        
        $this->Validate($request,[
            'name' => 'required',
        ],$messages);

        if(empty($features)) {

            Features::create([
                'name' => $request->name
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Feature Added Successfully.');
    
            return redirect('admin/features');
        }
        else { 

            $features->name = $request->name;
            $features->save();

            session()->flash('type','message');
            session()->flash('message', 'Feature Updated Successfully.');

            return redirect('admin/features');
        }
    }

    public function deleteFeatures($id) {

        Features::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Feature Deleted Successfully.');

        return redirect('admin/features');
    }
}