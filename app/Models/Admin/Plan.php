<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'slug',
        'name',
        'price',
        'discounted_price',
        'number_of_property',
        'duration_in_day',
        'image',
        'description',
        'buyer_notification',
        'top_listing',
        'trust_seal',
        'verified_enquiry',
        'classified',
        'search_banner',
    ];
}
