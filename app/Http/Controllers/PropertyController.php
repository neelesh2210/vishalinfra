<?php

namespace App\Http\Controllers;

use Auth;
use App\CPU\UserManager;
use App\CPU\PropertyManager;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class PropertyController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $search_price = $request->search_price;
        $search_bedroom = $request->search_bedroom;
        $search_room_type = $request->search_room_type;
        $search_city = $request->search_city;
        $search_property = $request->search_property;
        $search_project = $request->search_project;
        $search_status = $request->search_status;

        $properties = PropertyManager::withoutTrash();
        if($search_project){
            $properties = $properties->where('project_id',$search_project);
        }
        if($search_property){
            $properties = $properties->where('properties_type',$search_property);
        }
        if($search_city){
            $properties = $properties->where('city',$search_city);
        }
        if($search_room_type){
            $properties = $properties->where('furnished_status',$search_room_type);
        }
        if($search_bedroom){
            $properties = $properties->where('bedroom',$search_bedroom);
        }
        if($search_price){
            if($search_price == 'price_high_low'){
                $sortBy = 'final_price';
                $sortType = 'desc';
            }elseif($search_price == 'price_low_high'){
                $sortBy = 'final_price';
                $sortType = 'asc';
            }elseif($search_price == 'carpet_high_low'){
                $sortBy = 'carpet_area';
                $sortType = 'desc';
                $properties = $properties->where('carpet_area','!=',null);
            }elseif($search_price == 'carpet_low_high'){
                $sortBy = 'carpet_area';
                $sortType = 'asc';
                $properties = $properties->where('carpet_area','!=',null);
            }
            $properties = $properties->orderBy($sortBy,$sortType);
        }
        if($search_status != null){
            $properties = $properties->where('is_status',$search_status);
        }
        if($search_key){
            $properties = $properties->where('name','like','%'.$search_key.'%');
        }

        $properties = $properties->with(['bookProperty','project','phase'])->orderBy('id','desc')->paginate(15);

        if($request->ajax()){
            return view('frontend.user.property.table',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'));
        }

        return view('frontend.user.property.index',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'),['page_title'=>'Properties']);
    }

    public function propertyDetail($property_id){
        $property = PropertyManager::withoutTrash()->where('id',$property_id)->first();
        $users = UserManager::customerWithoutTrash()->where('referral_code',Auth::guard('web')->user()->referrer_code)->get();

        return view('frontend.user.property.detail',compact('property','users'));
    }

    public function propertyList(Request $request){
        $search_property_type = $request->properties_type;
        $search_location = $request->location;
        $search_price_range = $request->price_range;
        $search_selling_type = $request->property_selling_type;
        $city_banner = null;

        $properties = PropertyManager::withoutTrash();

        if($search_property_type){
            $properties = $properties->where('properties_type',$search_property_type);
        }
        if($search_location){
            $city_banner = optional(Banner::where('from','search')->where('city_id',$search_location)->first())->image;
            $properties = $properties->where('city',$search_location);
        }
        if($search_price_range){
            $properties = $properties->whereBetween('final_price',[explode(',',$search_price_range)[0],explode(',',$search_price_range)[1]]);
        }
        if($search_selling_type){
            $properties = $properties->where('property_selling_type',$search_selling_type);
        }

        $properties = $properties->orderBy('created_at','desc')->paginate(10);

        return view('frontend.properties',compact('properties','city_banner'));
    }

    public function detail($slug){
        try {
            $property_detail = PropertyManager::withoutTrash()->where('slug',$slug)->first();
            $similer_properties = PropertyManager::withoutTrash()->where('id','!=',$property_detail->id)->where('properties_type',$property_detail->properties_type)->orderBy('created_at','desc')->take(10)->get();
            $projects = Project::where('is_active','1')->take(10)->get();
            $city_banner = optional(Banner::where('from','product_detail')->where('city_id',$property_detail->city)->first())->image;

            return view('frontend.properties_details',compact('property_detail','similer_properties','projects','city_banner'));
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    public function projectDetail($id){
        try {
            $project_detail = Project::where('is_active','1')->where('id',$id)->first();

            return view('frontend.project_details',compact('project_detail'));
        } catch (\Throwable $th) {
            abort(404);
        }
    }

}
