<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account_Model extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'account';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'facebook_id',
        'provider',
        'gender',
        'phone',
        'email',
        'email_account',
        'address',
        'avatar',
        'username',
        'password',
        'is_author',
        'is_role',
        'is_active',
        'is_delete',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
