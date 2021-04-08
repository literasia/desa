<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageStructure extends Model
{
    protected $guarded = ['id'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }
}
