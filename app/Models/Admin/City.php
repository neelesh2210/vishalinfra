<?php

namespace App\Models\Admin;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function property(){
        return $this->hasMany(Property::class,'city');
    }
}
