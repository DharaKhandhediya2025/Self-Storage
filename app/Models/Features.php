<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;

    protected $table = 'features';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['name'];
}