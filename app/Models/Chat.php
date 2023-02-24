<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';

    protected $fillable = ['content','storage_id','sender_id','receiver_id','sender_status','read'];

    protected $hidden = ['created_at','updated_at'];
}