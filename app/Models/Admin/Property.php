<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\BookProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable =[
        'slug',
        'added_by',
        'project_id',
        'plan_purchase_id',
        'property_number',
        'name',
        'properties_type',
        'property_selling_type',
        'offer',
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
        'price',
        'booking_amount',
        'maintenance_charge',
        'discounted_price',
        'final_price',
        'commission',
        'prize',
        'photos',
        'thumbnail_img',
        'booking_status',
        'amenities',
        'remark',
        'is_trust_seal',
        'is_featured',
        'is_demanded',
        'is_trending',
        'status',
    ];

    public function planPurchase(){
        return $this->belongsTo(PlanPurchase::class);
    }

    public function cities(){
        return $this->belongsTo(City::class,'city');
    }

    public function addedBy(){
        return $this->belongsTo(User::class,'added_by');
    }
}
