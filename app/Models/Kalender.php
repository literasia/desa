<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    //
    protected $fillable = [
        'villages_id', 'title', 'start_date', 'end_date', 'start_clock', 'end_clock', 'priority',
    ];
    protected $table = "kalenders";
    protected $guarded = [];
}
