<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\DaftarArea;
use App\Models\DaftarBus;
use App\Models\Order;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SifatPemesanan;

class HomeController extends Controller
{
    public function index(Request $request){

        $daftarproduk = Produk::latest()->paginate(6);
        $daftararea1 = DaftarArea::get();
        $daftarbus = DaftarBus::with('produk')->get();
        $daftarsifat = SifatPemesanan::get();

        if($request->has('search')){
            $daftarbus = DaftarBus::join('daftar_areas','daftar_areas.id', '=', 'daftar_buses.kode_area')
                ->join('produks','produks.kode_bus', '=', 'daftar_buses.id')
                ->where(function($q) use ($request){
                    if($request->asal != null && $request->tujuan != null && $request->sifat != null ){
                        $q->where('asal', $request->get('asal'))->where('tujuan', $request->get('tujuan'))->where('sifat_pemesanan', $request->get('sifat'));
                    }
                    else if($request->asal != null && $request->tujuan != null){

                        $q->where('asal', $request->get('asal'))->where('tujuan', $request->get('tujuan'));
                    }
                    else if($request->asal != null && $request->sifat != null){

                        $q->where('asal', $request->get('asal'))->where('sifat_pemesanan', $request->get('sifat'));
                    }
                    else if($request->tujuan != null && $request->sifat != null){

                        $q->where('tujuan', $request->get('tujuan'))->where('sifat_pemesanan', $request->get('sifat'));
                    }
                    else if($request->sifat != null){

                        $q->where('sifat_pemesanan', $request->get('sifat'));
                    }
                    else if($request->asal != null){

                        $q->where('asal', $request->get('asal'));
                    }
                    else if($request->tujuan != null){

                        $q->where('tujuan', $request->get('tujuan'));
                    }
                })
                ->get(['produks.*','daftar_areas.*','daftar_buses.*']);

        }
        return view('pemesan.home.index',compact(['daftarproduk','daftararea1','daftarbus','daftarsifat']));
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

    public function pesan(Request $request){
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
