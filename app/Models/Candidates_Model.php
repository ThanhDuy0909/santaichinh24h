<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates_Model extends Model
{
    protected $table = 'candidates';

    public $timestamps = false;

    protected $fillable = [
        'full_nameCandidates',
        'imgname',
        'imghash',
        'imgext',
        'filename',
        'filehash',
        'fileext',
        'gender_candidates',
        'marital_candidates',
        'birthday_candidates',
        'phone_candidates',
        'email_candidates',
        'address_candidates',
        'school_candidates',
        'education_level',
        'graduate_candidates',
        'create_by_id',
    ];

}
