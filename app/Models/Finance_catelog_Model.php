<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance_catelog_Model extends Model
{
    protected $table = 'Finance_catelog';

    public $timestamps = false;

    protected $fillable = [
        'catelog_id',
        'finance_id',
    ];
}
