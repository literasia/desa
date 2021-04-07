<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'village_id', 'name', 'category', 'content', 'image', 'create_date'
    ];
    protected $guarded = [];

}
