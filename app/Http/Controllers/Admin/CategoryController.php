<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {

        $category = Category::orderBy('id','desc')->get();
        $count = sizeof($category);

        return view('admin.category.index',compact('category','count'));
    }

    public function addUpdateCategory(Request $request ,$id=false) {

        $category = new Category();

        if($id) {
            $category = Category::where('id','=',$id)->firstOrFail();
        }
        return view('admin.category.add-update-category',compact('category'));
    }

    public function saveCategory(Request $request) {

        $id = $request->get('id');
        $category = Category::find($id);

        $messages = [
            'name.required' => 'Category Name is Required.',
        ];
        
        $this->Validate($request,[
            'name' => 'required',
        ],$messages);

        if(empty($category)) {

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Category Added Successfully.');
    
            return redirect('admin/category');
        }
        else { 

            $category->name = $request->name;
            $category->slug = Str::slug($request->name, '-');
            $category->save();

            session()->flash('type','message');
            session()->flash('message', 'Category Updated Successfully.');

            return redirect('admin/category');
        }
    }

    public function deleteCategory($id) {

        Category::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Category Deleted Successfully.');

        return redirect('admin/category');
    }
}