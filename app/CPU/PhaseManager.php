<?php

namespace App\CPU;

use App\Models\Admin\Phase;
use Illuminate\Support\Str;

class PhaseManager
{

    public static function withoutTrash(){
        return Phase::where('is_delete','0');
    }

}
