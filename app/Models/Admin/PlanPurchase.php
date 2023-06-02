<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'number_of_property',
        'duration_in_day',
        'price',
        'discounted_price',
        'payment_detail',
        'payment_status',
    ];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
