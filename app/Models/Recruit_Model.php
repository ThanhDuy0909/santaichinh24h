<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruit_Model extends Model
{
    protected $table = 'recruit';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'expiration_date',
        'type_work',
        'education_level',
        'exp',
        'salary',
        'content_work',
        'regime_work',
        'profile_work',
        'contact_work',
        'create_by_id',
    ];
}
