<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';

    protected $hidden = ['updated_at'];

    protected $fillable = ['active_block_status','firebase_uid','google_id','facebook_id','apple_id','name','email','password','profile_image','latitude','longitude','country_code','phone','otp','otp_verify','fcm_token','custom_token'];
}