<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteStorage extends Model
{
    use HasFactory;

    protected $table = 'favorite_storage';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','buyer_id'];
}