<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruit_catelog_Model extends Model
{
    protected $table = 'recruit_catelog';

    public $timestamps = false;

    protected $fillable = [
        'catelog_id',
        'recruit_id',
    ];
}
