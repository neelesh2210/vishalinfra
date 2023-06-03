<?php

namespace App\Models\Admin;

use App\Models\BookProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable =[
        'slug',
        'added_by',
        'plan_purchase_id',
        'property_number',
        'name',
        'properties_type',
        'city',
        'landmark',
        'furnished_status',
        'transaction_type',
        'prossession_status',
        'bedroom',
        'bathroom',
        'balconies',
        'floor_no',
        'total_floor',
        'carpet_area',
        'super_area',
        'plot_area',
        'plot_length',
        'plot_breadth',
        'self_tieup',
        'plot_type',
        'facing',
        'expected_price',
        'price',
        'booking_amount',
        'maintenance_charge',
        'token_money',
        'base_price',
        'agent_price',
        'final_price',
        'commission',
        'prize',
        'photos',
        'thumbnail_img',
        'booking_status',
        'remark',
        'status',
    ];

    public function planPurchase(){
        return $this->belongsTo(PlanPurchase::class);
    }
}
