<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'village_id', 'date_attendance', 'employee_id', 'status', 'editor_id'
    ];
}
