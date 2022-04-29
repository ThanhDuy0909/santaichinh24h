<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_province_Model extends Model
{
    protected $table = 'Candidates_province';

    public $timestamps = false;

    protected $fillable = [
        'province_id',
        'candidates_id',
    ];
}
