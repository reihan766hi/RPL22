<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("pemesan.index");
    }

    public function indexAdmin(){
        return view("dashboard.index");
    }
}
