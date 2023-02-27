<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedPlan extends Model
{
    use HasFactory;

    protected $table = 'featured_plans';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['type','price','validity','duration'];

    public static function getPlanType() {

        $plan_type = array();
        $plan_type['Trial'] = 'Trial Plan';
        $plan_type['Standard'] = 'Standard Plan';
        $plan_type['Premium'] = 'Premium Plan';

        return $plan_type;
    }

    public static function getDurationList() {

        $duration_list = array();
        $duration_list['Week'] = 'Week';
        $duration_list['Month'] = 'Month';

        return $duration_list;
    }
}