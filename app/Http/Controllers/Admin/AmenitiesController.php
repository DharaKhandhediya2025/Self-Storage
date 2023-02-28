<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
use App\Models\Category;

class AmenitiesController extends Controller
{
    public function index() {

        $amenities = Amenities::with('category')->orderBy('id','desc')->get();
        $count = sizeof($amenities);

        return view('admin.amenities.index',compact('amenities','count'));
    }

    public function addUpdateAmenities(Request $request ,$id=false) {

        $category = Category::orderBy('id','desc')->get();

        $amenities = new Amenities();

        if($id) {
            $amenities = Amenities::where('id','=',$id)->firstOrFail();
        }
        return view('admin.amenities.add-update-amenities',compact('category','amenities'));
    }

    public function saveAmenities(Request $request) {

        $id = $request->get('id');
        $amenities = Amenities::find($id);

        $messages = [

            'cat_id.required' => 'Please Select Category.',
            'name.required' => 'Amenities Name is Required.',
        ];
        
        $this->Validate($request,[

            'cat_id' => 'required',
            'name' => 'required',
        ],$messages);

        if(empty($amenities)) {

            Amenities::create([

                'cat_id' => $request->cat_id,
                'name' => $request->name,
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Amenities Added Successfully.');
    
            return redirect('admin/amenities');
        }
        else { 

            $amenities->cat_id = $request->cat_id;
            $amenities->name = $request->name;
            $amenities->save();

            session()->flash('type','message');
            session()->flash('message', 'Amenities Updated Successfully.');

            return redirect('admin/amenities');
        }
    }

    public function deleteAmenities($id) {

        Amenities::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Amenities Deleted Successfully.');

        return redirect('admin/amenities');
    }
}