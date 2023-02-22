<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Users extends Model
{
    use HasFactory,HasApiTokens;

    protected $table = 'users';

    protected $hidden = ['updated_at'];

    protected $fillable = ['status','firebase_uid','google_id','facebook_id','apple_id','name','email','language_id','address','city_id','country_id','country_code','phone','gender','profile_image','otp','otp_verify','fcm_token','custom_token'];

    public static function checkauth($token) {

        $user = Users::where('custom_token',$token)->first();
        if($user) {
            return $user->id;
        }
        else {
            return 0;
        }
    }
}