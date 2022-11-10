<?php

namespace App\Http\Controllers;
use App\Models\DaftarBus;
use App\Models\DaftarArea;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $daftarbus = DaftarBus::latest()->paginate(6);
        $daftararea = DaftarArea::get();
        return view('pemesan.index',compact(['daftarbus','daftararea']));
    }

    public function indexAdmin(){
        return view("dashboard.index");
    }
}
