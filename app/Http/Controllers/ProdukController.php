<?php

namespace App\Http\Controllers;
use App\Models\DaftarArea;
use App\Models\DaftarBus;
use App\Models\Produk;
use Illuminate\Http\Request;
use Alert;
use App\Models\SifatPemesanan;

class ProdukController extends Controller
{
    public function index(){
        $daftararea = DaftarArea::get();
        $daftarbus = DaftarBus::get();
        $daftarproduk = Produk::latest()->paginate(6);
        $sifat = SifatPemesanan::get();
        return view('daftarproduk.index',compact(['daftarproduk','daftararea','daftarbus','sifat']));
    }

    public function tambahproduk(Request $request){
        $daftarproduk = new Produk;
        $daftarproduk->kode_bus = $request->kodebus;
        $daftarproduk->harga = $request->harga;
        $daftarproduk->sifat_pemesanan = $request->sifatpemesanan;
        $daftarproduk->jadwal = $request->jadwal;
        $daftarproduk->save();

        Alert::success('Sukses', 'Menambah produk');
        return redirect()->back();
    }

    public function editproduk(Request $request,$id){
        $daftarproduk = Produk::findOrFail($id);
        $daftarproduk->kode_bus = $request->kodebus;
        $daftarproduk->harga = $request->harga;
        $daftarproduk->sifat_pemesanan = $request->sifatpemesanan;
        $daftarproduk->jadwal = $request->jadwal;
        $daftarproduk->save();
        Alert::warning('Sukses', 'Mengedit bus');
        return redirect()->back();
    }

    public function hapusproduk($id)
    {
        Produk::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus produk');
        return redirect()->back();
    }
}
