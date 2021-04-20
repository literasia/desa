<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Pegawai;

class Access extends Model
{
    protected $guarded = [];

    public function employee()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
