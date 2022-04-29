<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cic extends Model
{
    protected $table = 'cic';
    public $timestamps = false;
    protected $fillable = [
        'tieude',
        'loaihinh',
        'noidung',
        'tencongty',
        'name',
        'phone',
        'email',
        'diachi',
    ];
}
