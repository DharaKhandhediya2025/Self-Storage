<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedPlan extends Model
{
    use HasFactory;

    protected $table = 'featured_plans';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['type','total_storages','price','validity','duration'];

    public static function getStorageType() {

        $post_type = array();
        $post_type['Single'] = 'Single';
        $post_type['Multiple'] = 'Multiple';

        return $post_type;
    }

    public static function getDurationList() {

        $duration_list = array();
        $duration_list['Week'] = 'Week';
        $duration_list['Month'] = 'Month';

        return $duration_list;
    }
}