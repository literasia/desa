<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
    	'village_id', 'title', 'description', 'start_date', 'end_date', 'image'
    ];
}
