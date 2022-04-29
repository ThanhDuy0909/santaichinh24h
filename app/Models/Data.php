<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    public $timestamps = false;
    protected $fillable = [
        'tieude',
        'loaidata',
        'tinhthanh',
        'noidung',
        'name',
        'phone',
        'email',
        'diachi',
    ];
}
