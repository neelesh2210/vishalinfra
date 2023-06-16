<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function property(){
        return $this->hasMany(Property::class,'plan_purchase_id','id');
    }
}
