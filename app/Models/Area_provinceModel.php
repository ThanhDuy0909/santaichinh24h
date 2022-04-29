<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area_provinceModel extends Model
{
    protected $table = 'area_province';

    public $timestamps = false;

    protected $fillable = [
        'province',
        'region_id'
    ];

}
