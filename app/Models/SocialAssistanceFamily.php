<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAssistanceFamily extends Model
{
    protected $guarded = ['id'];

    public function family(){
        return $this->belongsTo(Family::class);
    }

    public function socialAssistanceType(){
        return $this->belongsTo(socialAssistanceType::class);
    }
}
