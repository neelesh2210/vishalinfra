<?php

namespace App\Http\Controllers\Admin;

use Str;
use Illuminate\Http\Request;
use App\Models\Admin\Amenity;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{

    public function index(){
        $amenities = Amenity::orderBy('name','asc')->paginate(10);

        return view('admin.amenity.index',compact('amenities'),['page_title'=>'Amenity List']);
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
