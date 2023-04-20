<?php

namespace App\CPU;

use App\Models\User;
use Illuminate\Support\Str;

class UserManager
{

    public static function customerWithoutTrash(){
        return User::where('type','customer')->where('is_delete','0');
    }

    public static function associateWithoutTrash(){
        return User::where('type','associate')->where('is_delete','0');
    }

}
