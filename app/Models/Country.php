<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['name','flag','code','dial_code'];
}