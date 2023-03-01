<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedPlanFunctionality extends Model
{
    use HasFactory;

    protected $table = 'featured_plan_functionality';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['featured_plan_id','functionality'];
}