<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\City;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{

    public function index(){
        $banners = Banner::orderBy('from','asc')->get();
        $cities = City::orderBy('name','asc')->get();

        return view('admin.website_setup.banner.index',compact('banners','cities'),['page_title'=>'Banners']);
    }

    public function store(Request $request){
        $banner = Banner::where('from',$request->from)->where('city_id',$request->city_id)->first();
        if(!$banner){
            $banner = new Banner;
            $banner->from = $request->from;
            $banner->city_id = $request->city_id;
        }
        if($request->has('image')){
            $banner->image = imageUpload($request->file('image'),'backend/img/banners');
        }
        $banner->save();

        return back()->with('success','Banner Added Successfully!');
    }

    public function destroy($id){
        Banner::destroy(decrypt($id));

        return back()->with('error','Banner Deleted Successfully!');
    }
}
