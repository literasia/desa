<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = ['id'];

    public function citizen(){
        return $this->belongsTo(Citizen::class);
    }

    public function socialAssistanceFamily(){
        return $this->hasMany(SocialAssistanceFamily::class);
    }
}
