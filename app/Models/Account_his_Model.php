<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account_his_Model extends Model
{
    protected $table = 'account_history';

    public $timestamps = false;

    protected $fillable = [
        'ip_address',
        'id_account',
        'status',
    ];

}
