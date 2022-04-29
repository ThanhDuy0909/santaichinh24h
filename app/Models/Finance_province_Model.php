<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance_province_Model extends Model
{
    protected $table = 'Finance_province';

    public $timestamps = false;

    protected $fillable = [
        'province_id',
        'finance_id',
    ];
}
