<?php

namespace App\Http\Controllers;

use App\Models\SifatPemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SifatPesananController extends Controller
{
    public function index(){

        $data = SifatPemesanan::paginate(10);
        return view('sifatpemesanan.index',compact(['data']));
    }

    public function tambahSifat(Request $request){
        $data = new SifatPemesanan();
        $data->status = $request->status;
        $data->save();

        Alert::success('Sukses', 'Menambah sifat');
        return redirect()->back();
    }


    public function editSifat(Request $request, $id){
        $data = SifatPemesanan::findOrFail($id);
        $data->status = $request->status;
        $data->update();

        Alert::success('Sukses', 'Edit sifat');
        return redirect()->back();
    }

    public function hapusSifat($id){
        $data = SifatPemesanan::findOrFail($id);
        $data->delete();

        Alert::success('Sukses', 'Hapus sifat');
        return redirect()->back();
    }
}
