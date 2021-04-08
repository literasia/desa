<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'village_id', 'candidate', 'deputy_candidate', 'vision', 'mission', 'image'
    ];
    protected $table = "campaigns";
    protected $guarded = [];
}
