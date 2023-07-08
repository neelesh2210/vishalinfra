<?php

namespace App\Http\Controllers\Admin;

use Str;
use Illuminate\Http\Request;
use App\Models\Admin\Amenity;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;

        $amenities = Amenity::orderBy('name','asc');

        if($search_key){
            $amenities = $amenities->where('name','LIKE','%'.$search_key.'%');
        }

        $amenities = $amenities->paginate(10);

        if($request->ajax()){
            return view('admin.amenity.table',compact('amenities','search_key'));
        }

        return view('admin.amenity.index',compact('amenities','search_key'),['page_title'=>'Amenity List']);
    }

    public function create(){
        return view('admin.amenity.create',['page_title'=>'Add Amenity']);
    }

    public function store(Request $request){
        $amenity = new Amenity;
        $amenity->slug = Str::slug($request->name).'-'.generateRandomString(3);
        $amenity->name = $request->name;
        $amenity->image = imageUpload($request->file('image'),'backend/img/amenity');
        $amenity->icon = $request->icon;
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success','Amenity Added Successfully!');
    }

    public function edit(Amenity $amenity){
        return view('admin.amenity.edit',compact('amenity'),['page_title'=>'Edit Amenity']);
    }

    public function update(Request $request,Amenity $amenity){
        $amenity->name = $request->name;
        if($request->has('image')){
            $amenity->image = imageUpload($request->file('image'),'backend/img/amenity');
        }
        $amenity->icon = $request->icon;
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success','Amenity Updated Successfully!');
    }

    public function destroy(Amenity $amenity){
        $amenity->delete();

        return redirect()->route('admin.amenities.index')->with('error','Amenity Deleted Successfully!');
    }

}
