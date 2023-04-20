<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'images',
        'lat',
        'long',
        'country',
        'state',
        'city',
        'pincode',
        'description',
        'address',
        'is_delete',
    ];
}
