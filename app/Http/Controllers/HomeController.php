<?php

namespace App\Http\Controllers;

use App\CPU\PropertyManager;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Models\Admin\Project;

class HomeController extends Controller
{

    public function index(){
        $properties = PropertyManager::withoutTrash()->orderBy('created_at','desc')->take(12)->get();
        $projects = Project::where('is_active','1')->take(12)->get();
        $featured_properties = PropertyManager::withoutTrash()->where('is_featured','1')->take(12)->get();
        return view('frontend.index',compact('properties','projects','featured_properties'));
    }
}
