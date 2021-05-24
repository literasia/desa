<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAssistanceType extends Model
{
    protected $guarded = ['id'];

    public function socialAssistanceFamily(){
        return $this->hasMany(SocialAssistanceFamily::class);
    }

    public function socialAssistanceIndividu(){
        return $this->hasMany(SocialAssistanceIndividu::class);
    }
}
