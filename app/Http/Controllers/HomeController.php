<?php

namespace App\Http\Controllers;
use App\Models\DaftarBus;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $daftarbus = DaftarBus::latest()->paginate(6);
        return view('pemesan.index',compact(['daftarbus']));
    }
}
