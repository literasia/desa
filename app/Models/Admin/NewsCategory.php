<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';
	protected $fillable = [
        'village_id','name'
    ];
    protected $guarded = [];
}
