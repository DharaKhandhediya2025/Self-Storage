<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageImages extends Model
{
    use HasFactory;

    protected $table = 'storage_images';

    protected $fillable = ['storage_id','image'];

    protected $hidden = ['created_at','updated_at'];
}