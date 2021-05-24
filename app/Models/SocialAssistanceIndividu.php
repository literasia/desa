<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAssistanceIndividu extends Model
{
    protected $guarded = ['id'];

    public function citizen(){
        return $this->belongsTo(Citizen::class);
    }

    public function socialAssistanceType(){
        return $this->belongsTo(SocialAssistanceType::class);
    }
}
