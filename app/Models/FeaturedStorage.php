<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedStorage extends Model
{
    use HasFactory;

    protected $table = 'featured_storages';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['seller_id','featured_id','storage_id','expired_date'];

    public function featured_plan_detail() {
        return $this->belongsTo(FeaturedPlan::class,'featured_id','id');
    }
}