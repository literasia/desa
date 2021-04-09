<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{
    protected $fillable = [
        'village_id', 'name', 'nik','no_phone', 'address', 'status', 'image'
    ];
    protected $table = "domiciles";
    protected $guarded = [];
}
