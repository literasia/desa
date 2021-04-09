<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heir extends Model
{
    protected $fillable = [
        'village_id', 'name', 'nik','no_phone', 'address', 'status', 'image'
    ];
    protected $table = "heirs";
    protected $guarded = [];
}
