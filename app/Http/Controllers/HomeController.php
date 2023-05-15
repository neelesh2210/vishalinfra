<?php

namespace App\Http\Controllers;

use App\CPU\PropertyManager;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $properties = PropertyManager::withoutTrash()->with(['project'])->orderBy('created_at','desc')->take(12)->get();
        return view('frontend.index',compact('properties'));
    }
}
