<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UngvienController extends Controller
{
    public function ho_so_ung_vien()
    {
        return view('user.ung_vien.ho_so_ung_vien');
    }
    public function create_cv()
    {
        return view('user.ung_vien.create_cv');
    }
}
