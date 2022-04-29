<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catelog_Model extends Model
{
    protected $table = 'catelog';

    public $timestamps = false;

    protected $fillable = [
        'name',
        // 'parent_id',
        // 'child_id',
    ];

}
