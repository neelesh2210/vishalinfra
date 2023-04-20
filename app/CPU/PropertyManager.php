<?php

namespace App\CPU;

use Illuminate\Support\Str;
use App\Models\Admin\Property;

class PropertyManager
{

    public static function withoutTrash(){
        return Property::where('is_delete','0');
    }

}
