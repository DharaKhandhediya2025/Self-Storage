<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';

    protected $fillable = ['room_token,seller_id,buyer_id,property_id'];

    protected $hidden = ['created_at','updated_at'];


    public function property_info() 
    {
        return $this->belongsTo(Storage::class,'property_id','id')->with('storage_image');
    }
    
}