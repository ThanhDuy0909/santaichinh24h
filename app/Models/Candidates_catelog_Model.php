<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_catelog_Model extends Model
{
    protected $table = 'candidates_catelog';

    public $timestamps = false;

    protected $fillable = [
        'catelog_id',
        'candidates_id',
    ];
}
