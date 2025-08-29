<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Property;

class SellPropertyController extends Controller
{

    public function index() {
        $properties = Property::whereNotNull('project_id')->latest()->paginate(10);

        return view('frontend.user.property.sell_property.index', compact('properties'));
    }

}
