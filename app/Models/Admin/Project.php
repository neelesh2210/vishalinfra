<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'cover_image',
        'gallery_image',
        'address',
        'pincode',
        'about',
        'launch_date',
        'completion_date',
        'total_unit',
        'project_type',
        'project_area',
        'occupancy_certificated',
        'commencement_certificated',
        'why_buy',
        'amenities',
        'floor_plan',
        'videos',
        'is_active',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
