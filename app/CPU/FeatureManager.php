<?php

namespace App\CPU;

use Illuminate\Support\Str;
use App\Models\Admin\Feature;

class FeatureManager
{

    public static function withoutTrash(){
        return Feature::where('is_delete','0');
    }

}
