<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    //
    protected $fillable = [
        'village_id', 'title', 'start_date', 'end_date', 'start_clock', 'end_clock', 'priority','category_name','description','location',
    ];
    protected $table = "kalenders";
    protected $guarded = [];
}
