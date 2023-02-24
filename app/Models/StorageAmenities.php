<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageAmenities extends Model
{
    use HasFactory;

    protected $table = 'storage_amenities';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','amenities_id'];

    public function amenities_detail() {
        return $this->belongsTo(Amenities::class,'amenities_id','id');
    }
}