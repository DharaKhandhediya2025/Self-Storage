<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;

    protected $table = 'sellers';

    protected $hidden = ['updated_at'];

    protected $fillable = ['active_block_status','google_id','facebook_id','apple_id','name','email','country_code','phone','password','profile_image','latitude','longitude','fcm_token','currency','otp','otp_verify','firebase_uid','custom_token'];
}