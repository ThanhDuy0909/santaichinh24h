<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruit_province_Model extends Model
{
    protected $table = 'Recruit_province';

    public $timestamps = false;

    protected $fillable = [
        'catelog_id',
        'recruit_id',
    ];
}
