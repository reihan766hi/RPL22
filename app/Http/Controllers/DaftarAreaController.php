<?php

namespace App\Http\Controllers;
use App\Models\DaftarArea;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarAreaController extends Controller
{
    public function index(){

        $daftararea = DaftarArea::latest()->paginate(10);
        return view('daftararea.index',compact(['daftararea']));
    }

    public function tambahArea(Request $request){
        $daftararea = new DaftarArea;
        $daftararea->kode_area = $request->kodearea;
        $daftararea->asal = $request->asal;
        $daftararea->tujuan = $request->tujuan;
        $daftararea->status = $request->status;
        $daftararea->save();

        Alert::success('Sukses', 'Menambah area');
        return redirect()->back();
    }

    public function editArea(Request $request,$id){
        $daftararea = DaftarArea::findOrFail($id);
        $daftararea->kode_area = $request->kodearea;
        $daftararea->asal = $request->asal;
        $daftararea->tujuan = $request->tujuan;
        $daftararea->status = $request->status;

        $daftararea->save();
        Alert::warning('Sukses', 'Mengedit area');
        return redirect()->back();
    }

    public function hapusArea($id)
    {
        DaftarArea::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus area');
        return redirect()->back();
    }
}
