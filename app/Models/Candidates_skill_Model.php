<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_skill_Model extends Model
{
    protected $table = 'Candidates_skill';

    public $timestamps = false;

    protected $fillable = [
        'candidates_id',
        'skill_id',
    ];
}
