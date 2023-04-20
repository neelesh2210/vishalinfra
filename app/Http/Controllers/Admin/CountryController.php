<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $countries = Country::orderBy('name','asc');

        if($search_key){
            $countries = $countries->where('name','like','%'.$search_key.'%');
        }

        $countries = $countries->paginate(15);
        if($request->ajax()){
            return view('admin.manage_address.country.table',compact('countries','search_key'));
        }

        return view('admin.manage_address.country.index',compact('countries','search_key'),['page_title'=>'Countries']);
    }

    public function store(Request $request){
        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return back()->with('success','Country Added Successfully!');
    }

    public function edit(Request $request,$id){
        $search_key = $request->search_key;
        $edit_country = Country::find(decrypt($id));
        $countries = Country::orderBy('name','asc')->paginate(15);

        return view('admin.manage_address.country.index',compact('countries','edit_country','search_key'),['page_title'=>'Countries']);
    }

    public function update(Request $request,$id){
        $country = Country::find(decrypt($id));
        $country->name = $request->name;
        $country->save();

        return redirect()->route('admin.countries.index')->with('success','Country Updated Successfully!');
    }

    public function destroy($id){
        $country = Country::destroy(decrypt($id));

        return redirect()->route('admin.countries.index')->with('error','Country Deleted Successfully!');
    }

}
