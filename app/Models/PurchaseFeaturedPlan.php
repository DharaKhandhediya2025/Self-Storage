<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseFeaturedPlan extends Model
{
    use HasFactory;

    protected $table = 'purchase_featured_plan';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['seller_id','featured_id','purchase_storages','remaining_storages','active_date','expired_date'];

    public function featured_plan_details() {
        return $this->belongsTo(FeaturedPlan::class,'featured_id','id');
    }
}