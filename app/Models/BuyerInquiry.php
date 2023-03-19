<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerInquiry extends Model
{
    use HasFactory;

    protected $table = 'buyer_inquiry';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['buyer_id','storage_id','name','email','phone','message'];

    public function storage_details() {
        return $this->belongsTo(Storage::class,'storage_id','id');
    }

    public function buyers_details() {
        return $this->belongsTo(Buyer::class,'buyer_id','id');
    }
}