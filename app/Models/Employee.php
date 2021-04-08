<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function villageStructure(){
        return $this->hasMany(VillageStructure::class);
    }
}
