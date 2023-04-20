<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index(Request $request){
        $search_country = $request->search_country;
        $search_state = $request->search_state;
        $search_key = $request->search_key;

        $cities = City::orderBy('name','asc');

        if($search_country){
            $cities = $cities->where('country_id',$search_country);
        }
        if($search_state){
            $cities = $cities->where('state_id',$search_state);
        }
        if($search_key){
            $cities = $cities->where('name','like','%'.$search_key.'%');
        }

        $cities = $cities->with(['country','state'])->paginate(15)->onEachSide(-1);

        if($request->ajax()){
            return view('admin.manage_address.city.table',compact('cities','search_country','search_state','search_key'));
        }

        return view('admin.manage_address.city.index',compact('cities','search_country','search_state','search_key'),['page_title'=>'Cities']);
    }

    public function store(Request $request){
        $city = new City;
        $city->country_id = $request->country_id;
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->save();

        return back()->with('success','City Added Successfully!');
    }

    public function edit(Request $request,$id){
        $search_country = $request->search_country;
        $search_state = $request->search_state;
        $search_key = $request->search_key;
        $edit_city = City::find(decrypt($id));
        $cities = City::orderBy('name','asc')->with(['country','state'])->paginate(15)->onEachSide(-1);

        if($request->ajax()){
            return view('admin.manage_address.city.table',compact('cities','search_country','search_state','search_key'));
        }

        return view('admin.manage_address.city.index',compact('cities','edit_city','search_country','search_state','search_key'),['page_title'=>'Cities']);
    }

    public function update(Request $request,$id){
        $city = City::find(decrypt($id));
        $city->country_id = $city->country_id;
        $city->state_id = $city->state_id;
        $city->name = $request->name;
        $city->save();

        return redirect()->route('admin.cities.index')->with('success','City Updated Successfully!');
    }

    public function destroy($id){
        City::destroy(decrypt($id));

        return redirect()->route('admin.cities.index')->with('error','City Deleted Successfully!');
    }

    public function getCitiesByState(Request $request){
        return City::where('state_id',$request->state_id)->orderBy('name','asc')->get();
    }
}
