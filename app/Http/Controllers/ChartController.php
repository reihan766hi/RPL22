<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(){
        $totalOrder = Order::where('status','=',"menunggu konfirmasi")->count();

        $record =DB::table('orders as a')->select(
            DB::raw('CONCAT(b.pabrikan ," - ", b.plat_nomor) AS jenis_bus',),
            "a.kode_bus",
            DB::raw('COUNT(a.kode_bus) AS jumlah_order_bus')
        )
        ->where("status", "selesai")
        ->leftjoin('daftar_buses as b', 'b.kode_bus', '=', 'a.kode_bus')
        ->groupBy('a.kode_bus','b.pabrikan' , 'b.plat_nomor')
        ->get();

         $data = [];

         foreach($record as $row) {
            $data['label'][] = $row->jenis_bus;
            $data['data'][] = (int) $row->jumlah_order_bus;
          }
        $data['chart_data'] = json_encode($data);
        $chart_data = $data['chart_data'];
        return view('chart.chart', compact('totalOrder','chart_data'));
    }
}
