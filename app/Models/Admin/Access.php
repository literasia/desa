<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Pegawai;

class Access extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
    	return $this->belongsTo(Pegawai::class);
    }
}
