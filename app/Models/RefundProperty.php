<?php

namespace App\Models;

use App\Models\BookProperty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RefundProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount'
    ];

    public function bookProperty(){
        return $this->belongsTo(BookProperty::class,'booking_id');
    }
}
