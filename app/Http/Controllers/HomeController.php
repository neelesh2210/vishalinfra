<?php

namespace App\Http\Controllers;

use App\Models\Admin\City;
use App\CPU\PropertyManager;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class HomeController extends Controller
{

    public function index(){
        $projects = Project::where('is_active','1')->orderBy('id','desc')->take(12)->get();
        $properties = PropertyManager::withoutTrash()->where('is_status','1')->orderBy('created_at','desc')->take(12)->get();
        $featured_properties = PropertyManager::withoutTrash()->where('is_status','1')->where('is_featured','1')->take(12)->get();
        $most_demanded_properties = PropertyManager::withoutTrash()->where('is_status','1')->where('is_demanded','1')->take(12)->get();
        $cities = City::whereHas('property')->withCount('property')->orderBy('property_count', 'desc')->take(5)->get();
        $sliders = Slider::orderBy('priority','asc')->get();

        return view('frontend.index',compact('properties','projects','featured_properties','most_demanded_properties','cities','sliders'));
    }
}
