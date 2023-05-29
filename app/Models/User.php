<?php

namespace App\Models;

use App\Models\Admin\Payout;
use App\Models\Admin\UserDetail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\AssociateWallet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'added_by',
        'type',
        'name',
        'phone ',
        'email',
        'referrer_code',
        'referral_code',
        'aadhar_number',
        'is_kyced',
        'is_verified',
        'is_old',
        'is_delete'
    ];

    protected $hidden = [
        'password',
        'is_delete'
    ];

    public function userProfile(){
        return $this->belongsTo(UserProfile::class,'id','user_id');
    }

    public function userAddress(){
        return $this->belongsTo(UserAddress::class,'id','user_id');
    }

}
