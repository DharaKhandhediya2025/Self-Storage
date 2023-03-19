<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminites extends Model
{
    use HasFactory;

    protected $table = 'aminites';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['cat_id','name','image'];

    public function category() {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
