<?php

namespace App\Http\Controllers;
use App\Models\DaftarBus;
use App\Models\DaftarArea;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $daftarbus = DaftarBus::latest()->paginate(6);
        $daftararea = DaftarArea::get();
        $daftararea1 = DaftarArea::get();


        if($request->asal && $request->tujuan)
            $daftararea = DaftarArea::where('asal', 'LIKE',  '%' . $request->asal. '%')->where('tujuan', 'LIKE', '%' . $request->tujuan. '%')->get();
        else if($request->asal)
            $daftararea = DaftarArea::where('asal', 'LIKE', '%' . $request->asal. '%')->get();
        else if($request->tujuan)
            $daftararea = DaftarArea::where('tujuan', 'LIKE', '%' . $request->asal. '%')->get();

        return view('pemesan.home.index',compact(['daftarbus','daftararea','daftararea1']));
    }

    public function indexAdmin(){
        return view("dashboard.index");
    }
}
