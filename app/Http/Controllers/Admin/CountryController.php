<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\{Hash,DB,Auth};
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    protected $guard = 'admin';
    use AuthenticatesUsers;

    public function getCountries() {

        $country = Country::orderBy('id','asc')->get();
        $count = sizeof($country);

        $view_page = 'List';
        return view('admin.country', ['country' => $country,'count' => $count,'view_page' => $view_page]);
    }

    public function editCountry(Request $request, $id) {

        $country = Country::findOrFail($id);
        $view_page = 'form';

        return view('admin.country', ['country' => $country,'view_page' => $view_page]);
    }

    public function updateCountry(Request $request, $id) {

        $messages = [
            'name.required' => 'Name is Required Field',
            'code.required' => 'Code is Required Field',
            'dial_code.required' => 'Dial Code is Required Field'
        ];

        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'dial_code' => 'required'
        ],$messages);

        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->code = $request->code;
        $country->dial_code = $request->dial_code;
        $country->save();

        session()->flash('type','message');
        session()->flash('message', 'Country Updated Successfully.');

        return redirect('/admin/country');
    }
}