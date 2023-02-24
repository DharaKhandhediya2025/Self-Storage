<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;

    protected $table = 'payment_card';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['seller_id','holder_name','card_no','exp_date','cvv'];
}