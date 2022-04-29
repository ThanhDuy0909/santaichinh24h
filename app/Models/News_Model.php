<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_Model extends Model
{
    protected $table = 'news';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'images',
        'content_short',
        'content',
        'create_by_id',
    ];
}
