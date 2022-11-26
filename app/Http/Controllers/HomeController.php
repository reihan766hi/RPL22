<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\DaftarArea;
use App\Models\DaftarBus;
use App\Models\Order;
use App\Mail\SendEmail;
use App\Models\Seat;
use Illuminate\Support\Facades\Mail;
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
        $daftarbus = DaftarBus::get();
        $order = Order::get();
        return view("dashboard.index",compact(['order','daftarbus']));
    }

    public function indexHistory(){
        $order = Order::where('nama','=',auth()->user()->name)->latest()->paginate(1);
        $daftarbus = DaftarBus::get();
        return view("pemesan.home.history",compact(['order','daftarbus']));
    }

    public function formpemesanan($id){
        // $produk = Produk::findOrFail($id)->get();
        $produk = Produk::where('id','=',$id)->get();
        $seat = Seat::where('id_produk' , '=', $id)->get();
        return view("pemesan.home.formpemesanan",compact(['produk','seat']));
    }

    public function pesan(Request $request,$id){

    if($request->sifatpemesanan == "PRIBADI"){

        if($request->no_seat == null){
            Alert::success('Error', 'Please fill seats!');
        }

        $request->validate([
            'no_seat' => 'required',
        ]);
    }

        $produks = Produk::findOrFail($id);

        $order = new Order;
        $order->nama = $request->nama;
        $order->email = $request->email;
        $order->notelp = $request->notelp;
        $order->id_produks = $id;
        $arrSeat = $request->no_seat;

        $order->harga = count($arrSeat) * (float)$request->harga;
        $order->sifat_pemesanan = $request->sifatpemesanan;
        $order->jadwal = $request->jadwal;
        $order->bukti_pembayaran = $request->buktipembayaran;
        $order->status = "menunggu pembayaran";
        $order->save();

        if($request->sifatpemesanan == "PRIBADI"){
            foreach($arrSeat as $data){
                $seat = new Seat();
                $seat->no_seat = $data;
                $seat->id_order = $order->id;
                $seat->id_produk = (int)$id;
                $seat->id_bus = (int)$produks->kode_bus;
               $seat->save();
            }
        }

        Alert::success('Sukses', 'Pesenan Diproses');
        return redirect('/history');
    }

    public function uploadbukti(Request $request,$id){

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:3048',
        ]);

        $imageName = time().'.'.$request->bukti_pembayaran->extension();

        $request->bukti_pembayaran->move(public_path('bukti_pembayaran'), $imageName);

        $data = Order::findOrFail($id);
        $data->status = "menunggu konfirmasi";
        $data->bukti_pembayaran = $imageName;
        $data->update();

        Alert::success('Sukses', 'Upload Bukti Pembayaran');
        return redirect()->back();

    }

    public function setuju(Request $request,$id){
        $data = Order::findOrFail($id);
        $data->status = "selesai";

        $datas = [
            'data' => $data
        ];

        Mail::to($data->email)->send(new SendEmail($datas));

        if (Mail::failures()) {
            Alert::success('Error', 'Sorry! Please try again latter');
       }else if($data){
            $data->update();
            Alert::success('Sukses', 'Approved');
        }

        return redirect()->back();
    }

    public function ditolak(Request $request,$id){
        $data = Order::findOrFail($id);
        $data->status = "menunggu konfirmasi";
        $data->update();

        Alert::success('Sukses', 'Rejected');
        return redirect()->back();
    }
}
