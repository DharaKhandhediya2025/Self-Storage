<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempStorageVariant extends Model
{
    use HasFactory;

    protected $table = 'temp_storage_variant';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','dimension','inventory','price','surface'];
}