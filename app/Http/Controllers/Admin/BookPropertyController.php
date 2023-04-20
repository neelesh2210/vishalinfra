<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookPropertyController extends Controller
{

    public function bookedPropertyIndex(Request $request){
        $search_key = $request->search_key;
        $search_price = $request->search_price;
        $search_bedroom = $request->search_bedroom;
        $search_room_type = $request->search_room_type;
        $search_city = $request->search_city;
        $search_property = $request->search_property;
        $search_project = $request->search_project;

        $booked_properties = BookProperty::with(['property','property.project','property.phase']);

        if($search_project){
            $booked_properties = $booked_properties->whereHas('property.project', function($q) use ($search_project){
                $q->where('project_id',$search_project);
            });
        }
        if($search_property){
            $booked_properties = $booked_properties->whereHas('property', function($q) use ($search_property){
                $q->where('properties_type',$search_property);
            });
        }
        if($search_city){
            $booked_properties = $booked_properties->whereHas('property', function($q) use ($search_city){
                $q->where('city',$search_city);
            });
        }
        if($search_room_type){
            $booked_properties = $booked_properties->whereHas('property', function($q) use ($search_room_type){
                $q->where('furnished_status',$search_room_type);
            });
        }
        if($search_bedroom){
            $booked_properties = $booked_properties->whereHas('property', function($q) use ($search_bedroom){
                $q->where('bedroom',$search_bedroom);
            });
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
                $booked_properties = $booked_properties->whereHas('property', function($q){
                    $q->where('carpet_area','!=',null);
                });
            }elseif($search_price == 'carpet_low_high'){
                $sortBy = 'carpet_area';
                $sortType = 'asc';
                $booked_properties = $booked_properties->whereHas('property', function($q){
                    $q->where('carpet_area','!=',null);
                });
            }
            $booked_properties = $booked_properties->orderBy($sortBy,$sortType);
        }
        if($search_key){
            $booked_properties = $booked_properties->whereHas('property', function($q) use ($search_key){
                $q->where('name','like','%'.$search_key.'%');
            });
        }

        $booked_properties = $booked_properties->orderby('created_at','desc')->paginate(15);

        if($request->ajax()){
            return view('admin.property.booked.table',compact('booked_properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project'));
        }

        return view('admin.property.booked.index',compact('booked_properties','search_key','search_price','search_bedroom','search_room_type','search_city','search_property','search_project'),['page_title'=>'Booked Property']);
    }

}
