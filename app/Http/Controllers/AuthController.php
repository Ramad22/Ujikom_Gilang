<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\penjualan;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function login(){
        return view("login");
    }
    public function adminDashboard(){
        $member = pelanggan::count();
        $produk = produk::count();
        $transaksi = penjualan::count();
        $petugas = User::count();
        return view("admin.dashboard", compact('member', 'produk', 'transaksi', 'petugas'));
    }




    public function petugasDashboard(){
        $member = pelanggan::count();
        $produk = produk::count();
        $transaksi = penjualan::count();
        return view("petugas.dashboard", compact('member', 'produk', 'transaksi'));
    }
    public function petugasMember(){
        $pelanggan = pelanggan::all();
        return view("petugas.member", compact('pelanggan'));
    }
    public function profile(){
        $user = User::all();
        return view("admin.profile", compact('user'));
    }
    public function Pprofile(){
        $user = User::all();
        return view("petugas.profile", compact('user'));
    }




    public function prosesLogin(Request $request){
        $cek = $request->validate([
            "username" => ['required', 'min:2', 'max:100'],
            "password"=> ['required', 'min:2', 'max:100'],
        ]);

        $info = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $remember = request()->filled('remember');
        if(Auth::attempt($info, $remember)){
            if(Auth()->user()->role == 'admin'){
                return redirect('admin.dashboard');
            }elseif(Auth()->user()->role == 'petugas'){
                return redirect('petugas.dashboard');
            }
         }
         Alert::error( 'Please try again');
         return back();
        }

        public function logout(){
            Auth::logout();
            return redirect('login');
        }

}
