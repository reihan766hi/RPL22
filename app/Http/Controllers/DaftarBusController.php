<?php

namespace App\Http\Controllers;

use App\Models\DaftarBus;
use App\Models\DaftarArea;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarBusController extends Controller
{
    public function index(){

        $daftarbus = DaftarBus::latest()->paginate(10);
        $daftararea = DaftarArea::get();
        return view('daftarbus.index',compact(['daftarbus','daftararea']));
    }

    public function tambahBus(Request $request){
        $imgName = $request->gambarbus->getClientOriginalName() . '-' . time()
        . '.' . $request->gambarbus->extension();

        $request->gambarbus->move(public_path('gambar_bus'), $imgName);

        $daftarbus = new DaftarBus;
        $daftarbus->jenis = $request->jenisbus;
        $daftarbus->kode_bus = $request->kodebus;
        $daftarbus->pabrikan = $request->pabrikan;
        $daftarbus->no_mesin = $request->nomesin;
        $daftarbus->plat_nomor = $request->platnomor;
        $daftarbus->kode_area = $request->kodearea;
        $daftarbus->gambar_bus = $imgName;
        $daftarbus->save();

        Alert::success('Sukses', 'Menambah nomor bus');
        return redirect()->back();
    }

    public function editBus(Request $request,$id){
        $imgName = $request->gambarbus->getClientOriginalName() . '-' . time()
        . '.' . $request->gambarbus->extension();

        $request->gambarbus->move(public_path('gambar_bus'), $imgName);

        $daftarbus = DaftarBus::findOrFail($id);
        $daftarbus->jenis = $request->jenisbus;
        $daftarbus->kode_bus = $request->kodebus;
        $daftarbus->pabrikan = $request->pabrikan;
        $daftarbus->no_mesin = $request->nomesin;
        $daftarbus->plat_nomor = $request->platnomor;
        $daftarbus->kode_area = $request->kodearea;
        $daftarbus->gambar_bus = $imgName;
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
