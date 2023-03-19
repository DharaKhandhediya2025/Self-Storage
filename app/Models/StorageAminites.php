<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageAminites extends Model
{
    use HasFactory;

    protected $table = 'storage_aminites';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['storage_id','aminites_id'];

    public function aminites_detail() {
        return $this->belongsTo(Aminites::class,'aminites_id','id');
    }
}
