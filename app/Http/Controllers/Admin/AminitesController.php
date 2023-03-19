<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aminites;
use App\Models\Category;

class AminitesController extends Controller
{
    public function index() {

        $aminites = Aminites::with('category')->orderBy('id','desc')->get();
        $count = sizeof($aminites);

        return view('admin.aminites.index',compact('aminites','count'));
    }

    public function addUpdateAminites(Request $request ,$id=false) {

        $category = Category::orderBy('id','desc')->get();

        $aminites = new Aminites();

        if($id) {
            $aminites = Aminites::where('id','=',$id)->firstOrFail();
        }
        return view('admin.aminites.add-update-aminites',compact('category','aminites'));
    }

    public function saveAminites(Request $request) {

        $id = $request->get('id');
        $aminites = Aminites::find($id);

        $messages = [

            'cat_id.required' => 'Please Select Category.',
            'name.required' => 'Name is Required.',
        ];
        
        $this->Validate($request,[

            'cat_id' => 'required',
            'name' => 'required',
        ],$messages);

        if(empty($aminites)) {

            Aminites::create([

                'cat_id' => $request->cat_id,
                'name' => $request->name,
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Aminites Added Successfully.');
    
            return redirect('admin/aminites');
        }
        else { 

            $aminites->cat_id = $request->cat_id;
            $aminites->name = $request->name;
            $aminites->save();

            session()->flash('type','message');
            session()->flash('message', 'Aminites Updated Successfully.');

            return redirect('admin/aminites');
        }
    }

    public function deleteAminites($id) {

        Aminites::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Aminites Deleted Successfully.');

        return redirect('admin/aminites');
    }
}