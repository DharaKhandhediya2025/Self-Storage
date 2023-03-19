<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storages';

    protected $hidden = ['updated_at'];

    protected $fillable = ['seller_id','storage_status','cat_id','subcat_id','title','slug','storage_type','description','country','city','latitude','longitude','zipcode','phone1','phone2','storage_no','no_of_floors','size','size_unit','video_url'];

    public function seller() {
        return $this->belongsTo(Seller::class,'seller_id','id');
    }

    public function country_details() {
        return $this->belongsTo(Country::class,'country','id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function sub_category() {
        return $this->belongsTo(Subcategory::class,'subcat_id','id');
    }

    public function storage_image() {
        return $this->hasMany(StorageImages::class,'storage_id','id');
    }

    public function storage_amenities() {
        return $this->hasMany(StorageAmenities::class,'storage_id','id');
    }

    public function favorite_storage() {
        return $this->hasOne(FavoriteStorage::class,'storage_id','id');
    }

    public function storage_inquiries() {
        return $this->hasMany(BuyerInquiry::class,'storage_id','id');
    }

    public function buyer_inquiry() {
        return $this->hasOne(BuyerInquiry::class,'storage_id','id');
    }

    public function featured_storage() {
        return $this->hasOne(FeaturedStorage::class,'storage_id','id');
    }

    public function featured_storages() {
        return $this->hasMany(FeaturedStorage::class,'storage_id','id');
    }

    public function storage_variants() {
        return $this->hasMany(StorageVariant::class,'storage_id','id');
    }
}