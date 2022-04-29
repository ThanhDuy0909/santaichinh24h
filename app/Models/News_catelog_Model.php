<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_catelog_Model extends Model
{
    protected $table = 'News_catelog';

    public $timestamps = false;

    protected $fillable = [
        'catelog_id',
        'news_id',
    ];
}
