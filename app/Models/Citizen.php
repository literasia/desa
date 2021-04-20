<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $guarded = ['id'];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function village(){
        return $this->belongsTo(Village::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
