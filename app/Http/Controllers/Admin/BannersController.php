<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;

class BannersController extends Controller
{
    public function index() {

        $banners = Banners::orderBy('id','desc')->get();
        $count = sizeof($banners);

        return view('admin.banners.index',compact('banners','count'));
    }

    public function addUpdateBanner(Request $request ,$id=false) {

        $banners = new Banners();

        if($id) {
            $banners = Banners::where('id','=',$id)->firstOrFail();
        }
        return view('admin.banners.addUpdateBanners',compact('banners'));
    }

    public function saveBanner(Request $request) {

        $id = $request->get('id');
        $banners = Banners::find($id);

        $banner_image = $request->file('image');

        if (isset($banner_image) && $banner_image->isValid()) {
        
            $name = time().'.'.$banner_image->getClientOriginalExtension();
            $destinationPath = public_path('../storage/banners');
            $banner_image->storeAs('banners',$name,'public');
            $file_path = 'banners/'.$name;
        }

        if(empty($banners)) {

            $messages = [
                'image.required' => 'Image is Required Field.'
            ];
                
            $this->Validate($request,[
                'image' => 'required',
            ],$messages);

            Banners::create([
                'image' => $file_path,
            ]);

            session()->flash('type','message');
            session()->flash('message', 'Banner Added Successfully.');
    
            return redirect('admin/banners');
        }
        else {
            
            $banners->image = $file_path;
            $banners->save();

            session()->flash('type','message');
            session()->flash('message', 'Banner Updated Successfully.');

            return redirect('admin/banners');
        }
    }

    public function deleteBanner($id) {

        Banners::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'Banner Deleted Successfully.');

        return redirect('admin/banners');
    }
}