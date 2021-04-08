<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageTour extends Model
{
    protected $fillable = [
        'village_id',
        'name',
        'address',
        'day_open',
        'time_opening',
        'time_closing',
        'tour_type',
        'no_phone',
        'information'
    ];
    protected $table = "village_tours";
    protected $guarded = [];
}
