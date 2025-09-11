<?php

namespace App\Models;

use App\Models\Admin\Payout;
use App\Models\Admin\Commission;
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
        'user_name',
        'name',
        'email',
        'phone ',
        'is_verified',
        'is_blocked'
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

    public function commissions(){
        return $this->hasMany(Commission::class);
    }

    public function payouts(){
        return $this->hasMany(Payout::class);
    }

}
