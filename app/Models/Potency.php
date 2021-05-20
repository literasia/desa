<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog;

class Potency extends Model
{
    //
    protected $guarded = [];


    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
