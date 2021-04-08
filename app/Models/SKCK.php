<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKCK extends Model
{
    protected $fillable = [
        'village_id', 'name', 'nik','no_phone', 'address', 'status', 'image'
    ];
    protected $table = "s_k_c_k_s";
    protected $guarded = [];    
}
