<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarPenggunaController extends Controller
{
    public function index(){

        $user = User::latest()->paginate(10);
        return view('listpengguna.index',compact(['user']));
    }
}
