<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageVariant extends Model
{
    use HasFactory;

    protected $table = 'storage_variant';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','dimension','inventory','price','surface'];
}