<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyListingController extends Controller
{

    public function create(){
        return view('frontend.property_listing');
    }

}
