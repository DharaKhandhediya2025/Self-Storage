<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;

    protected $table = 'terms_condition';

    protected $fillable = ['description'];

    protected $hidden = ['created_at','updated_at'];
}