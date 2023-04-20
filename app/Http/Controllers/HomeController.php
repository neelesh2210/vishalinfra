<?php

namespace App\Http\Controllers;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        return view('frontend.index',compact('sliders'));
    }
}
