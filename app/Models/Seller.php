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

    protected $fillable = ['active_block_status','firebase_uid','google_id','facebook_id','apple_id','name','email','password','profile_image','latitude','longitude','country_code','phone','city','zipcode','address','otp','otp_verify','fcm_token','custom_token'];
}