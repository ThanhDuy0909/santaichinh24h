<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_work_Model extends Model
{
    protected $table = 'Candidates_work';

    public $timestamps = false;

    protected $fillable = [
        'candidates_id',
        'title_work',
        'ranks_work',
        'company_work',
        'form_work',
        'to_work',
        'content_work',
    ];
}
