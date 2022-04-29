<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area_regionModel extends Model
{
    protected $table = 'area_region';

    public $timestamps = false;

    protected $fillable = [
        'region',
    ];

}
