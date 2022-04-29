<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance_Model extends Model
{
    protected $table = 'finance';

    public $timestamps = false;

    protected $fillable = [
        'title',
        // 'catelog_item_id',
        // 'province_id',
        'content',
        'contact',
        'create_by_id',
    ];
}
