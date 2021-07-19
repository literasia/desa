<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function villageStructure(){
        return $this->hasMany(VillageStructure::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bumdes(){
        return $this->belongsTo(Bumdes::class, 'employee_id');
    }

    public function access(){
        return $this->hasOne(Admin\Access::class);
    }

    public function attendance(){
        return $this->hasOne(Attendance::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
