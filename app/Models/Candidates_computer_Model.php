<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_computer_Model extends Model
{
    protected $table = 'Candidates_computer';

    public $timestamps = false;

    protected $fillable = [
        'candidates_id',
        'computer_id',
        'level_id',
    ];
}
