<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['name','slug','image'];

    public function subcategory() {
        return $this->hasMany(Subcategory::class,'cat_id','id');
    }

    public function amenities() {
        return $this->hasMany(Amenities::class,'cat_id','id');
    }
}