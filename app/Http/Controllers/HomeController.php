<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\DaftarArea;
use App\Models\DaftarBus;
use App\Models\Order;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $daftarproduk = Produk::latest()->paginate(6);
        $daftararea1 = DaftarArea::get();
        $daftarbus = DaftarBus::get();

        if($request->asal != null && $request->tujuan != null)
            $daftararea = DaftarArea::where('asal', 'LIKE',  '%' . $request->asal. '%')->where('tujuan', 'LIKE', '%' . $request->tujuan. '%')->get();
        else if($request->asal != null)
            $daftararea = DaftarArea::where('asal', 'LIKE', '%' . $request->asal. '%')->get();
        else if($request->tujuan != null)
            $daftararea = DaftarArea::where('tujuan', 'LIKE', '%' . $request->tujuan. '%')->get();

        return view('pemesan.home.index',compact(['daftarproduk','daftararea1','daftarbus']));
    }

    public function indexAdmin(){
        return view("dashboard.index");
    }

    public function indexHistory(){
        return view("pemesan.home.history");
    }

    public function formpemesanan($id){
        // $produk = Produk::findOrFail($id)->get();
        $produk = Produk::where('id','=',$id)->get();

        return view("pemesan.home.formpemesanan",compact(['produk']));
    }

    public function pesan(){
        $order = new Order;
        $order->nama = $request->jenisbus;
        $order->email = $request->kodebus;
        $order->notelp = $request->pabrikan;
        $order->kode_bus = $request->nomesin;
        $order->harga = $request->harga;
        $order->sifat_pemesanan = $request->sifat_pemesanan;
        $order->jadwal = $request->jadwal;
        $order->bukti_pembayaran = $request->buktipembayaran;
        $order->status = $request->status;
        $order->save();

        Alert::success('Sukses', 'Pesenan Diproses');
        return redirect('/history');
    }
}
