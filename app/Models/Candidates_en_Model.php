<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_en_Model extends Model
{
    protected $table = 'Candidates_en';

    public $timestamps = false;

    protected $fillable = [
        'candidates_id',
        'language_id',
        'level_id',
    ];
}
