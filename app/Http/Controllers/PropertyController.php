<?php

namespace App\Http\Controllers;

use Auth;
use App\CPU\UserManager;
use App\CPU\PropertyManager;
use Illuminate\Http\Request;

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
            return view('frontend.user_dashboard.property.table',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'));
        }

        return view('frontend.user_dashboard.property.index',compact('properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project','search_status'),['page_title'=>'Properties']);
    }

    public function propertyDetail($property_id){
        $property = PropertyManager::withoutTrash()->where('id',$property_id)->first();
        $users = UserManager::customerWithoutTrash()->where('referral_code',Auth::guard('web')->user()->referrer_code)->get();

        return view('frontend.user_dashboard.property.detail',compact('property','users'));
    }

    public function propertyList(){
        $properties = PropertyManager::withoutTrash()->with(['project'])->orderBy('created_at','desc')->paginate(1);
        return view('frontend.properties',compact('properties'));
    }

    public function detail($slug){
        try {
            $property_detail = PropertyManager::withoutTrash()->where('slug',$slug)->first();
            $similer_properties = PropertyManager::withoutTrash()->where('id','!=',$property_detail->id)->orderBy('created_at','desc')->take(5)->get();

            return view('frontend.properties_details',compact('property_detail','similer_properties'));
        } catch (\Throwable $th) {
            abort(404);
        }
    }

}
