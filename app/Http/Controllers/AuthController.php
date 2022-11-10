<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function __construct(){

        $this->middleware('guest', ['except' => ['logout', 'postregister', 'deleteakun', 'editakun']]);

    }


    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }


    public function postregister(Request $request){

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
        ]);

        $data = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'alamat' => $request->alamat,
            'tgl_lahir' => date('Y-m-d', strtotime($request->tgl_lahir)),
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);

        if($request->register == 'register'){
            if($data){
                Alert::success('Sukses', 'Menambah Pengguna');
                return redirect()->back();

            }else{
                Alert::error('Gagal', 'Menambah Pengguna');
                return redirect('/daftarpengguna');
            }


        }else{
            if($data){
                return redirect('/login')->with('success', 'Data Berhasil Disimpan');

            }else{
                return redirect('/register')->with('error', 'Data Gagal Disimpan');
            }
        }


    }

    public function postlogin(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        $auth = Auth::attempt($credentials);
        if($auth){

            $role = Auth::user()->role;

            if($role == 'admin' || $role == 'pemesan'){
                return redirect('/dashboard')->with('success','Berhasil Login');
            }else{
                return redirect('/')->with('success','Berhasil Login');
            }


        }else{
            return back()->with('error','Username atau Password tidak sesuai');
        }

    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }


    public function deleteakun($id){

        User::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus Data Pengguna');
        return redirect()->back();
    }

    public function editakun(Request $request,$id){

        $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make( $request->password);
            $user->alamat = $request->alamat;
            $user->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
            $user->no_hp = $request->no_hp;
            $user->role = $request->role;

        $user->save();

        Alert::success('Sukses', 'Mengedit Data Pengguna');
        return redirect()->back();
    }

}

