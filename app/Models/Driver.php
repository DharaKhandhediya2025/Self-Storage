<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Driver extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $table = 'drivers';

    protected $hidden = ['updated_at'];

    protected $fillable = ['name','country_code','mobile_no','fcm_token','otp','otp_verify','password','email','image'];
}