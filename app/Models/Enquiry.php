<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'name',
        'phone',
        'email',
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }
}
