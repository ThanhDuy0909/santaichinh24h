<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AccountFb extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'accountfb';
    protected $guarded = 'facebook';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'facebook_id',
        'fullname',
        'email_cic',
        'phone',
        'address',
        'ma_cic',
        'tengoicheck',
        'soluotcheck',
        'ngaykichhoat',
        'ngayketthuc',
    ];
    protected $hidden = [
        'remember_token',
    ];
}
