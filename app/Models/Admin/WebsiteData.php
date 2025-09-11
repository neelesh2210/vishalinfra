<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteData extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'data',
        'content'
    ];
}
