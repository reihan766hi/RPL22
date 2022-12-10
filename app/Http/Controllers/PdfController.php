<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function invoice($id)
    {
        $data = [
            'order' => Order::findOrFail($id)
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);

        return $pdf->download('invoice.pdf');
    }

    public function pdfTransaksi($id){

        if($id == 1){
            $date = date('Y-m-d');
            $data = [
                'order' => Order::where('status','=',"selesai")->where('jadwal','=',$date)->get()
            ];
            $pdf = PDF::loadview('pdf.transaksi', $data);
            //mendownload laporan.pdf
            return $pdf->download('transaksi.pdf');
        }else if($id == 2){
            $bulan = date('m');
            $data = [
                'order' => Order::where('status','=',"selesai")->where('jadwal','like','_____'.$bulan.'%')->get()
            ];
            $pdf = PDF::loadview('pdf.transaksi', $data);
            return $pdf->download('transaksi.pdf');
        }else if($id == 3){
            $data = [
                'order' => Order::where('status','=',"selesai")->where('sifat_pemesanan','=',"INSTANSI")->get()
            ];
            $pdf = PDF::loadview('pdf.transaksi', $data);
            return $pdf->download('transaksi.pdf');
        }
    }
}
