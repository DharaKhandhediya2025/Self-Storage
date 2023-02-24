<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageRating extends Model
{
    use HasFactory;

    protected $table = 'storage_rating';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','buyer_id','rate','review'];

    public function buyer() {
        return $this->belongsTo(Buyer::class,'buyer_id','id');
    }
}