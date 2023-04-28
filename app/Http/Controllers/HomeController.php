<?php

namespace App\Http\Controllers;

use App\CPU\PropertyManager;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        $properties = PropertyManager::withoutTrash()->with(['project'])->orderBy('created_at','desc')->take(6)->paginate(1);
        return view('frontend.index',compact('sliders','properties'));
    }
}
