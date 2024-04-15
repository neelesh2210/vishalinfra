<?php

namespace App\Models;

use App\Models\Admin\Project;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'property_id',
        'name',
        'phone',
        'email',
        'message'
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'property_id');
    }
}
