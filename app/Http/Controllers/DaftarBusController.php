<?php

namespace App\Http\Controllers;

use App\Models\DaftarBus;
use Illuminate\Http\Request;
use Alert;

class DaftarBusController extends Controller
{
    public function index(){

        $daftarbus = DaftarBus::latest()->paginate(10);
        return view('daftarbus.index',compact(['daftarbus']));
    }

    public function tambahBus(Request $request){
        $daftarbus = new DaftarBus;
        $daftarbus->jenis = $request->jenisbus;
        $daftarbus->kode_bus = $request->kodebus;
        $daftarbus->pabrikan = $request->pabrikan;
        $daftarbus->no_mesin = $request->nomesin;
        $daftarbus->plat_nomor = $request->platnomor;
        $daftarbus->save();

        Alert::success('Sukses', 'Menambah nomor bus');
        return redirect()->back();
    }

    public function editBus(Request $request,$id){
        $daftarbus = DaftarBus::findOrFail($id);
        $daftarbus->jenis = $request->jenisbus;
        $daftarbus->kode_bus = $request->kodebus;
        $daftarbus->pabrikan = $request->pabrikan;
        $daftarbus->no_mesin = $request->nomesin;
        $daftarbus->plat_nomor = $request->platnomor;
        $daftarbus->save();
        Alert::warning('Sukses', 'Mengedit bus');
        return redirect()->back();
    }

    public function hapusBus($id)
    {
        DaftarBus::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus bus');
        return redirect()->back();
    }
}
