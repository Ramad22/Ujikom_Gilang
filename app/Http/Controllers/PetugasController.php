<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function adminPetugas(){
        $petugas = User::where('role', 'petugas')->paginate(10);
        return view("admin.petugas", compact('petugas'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function addPetugas(Request $request)
    {
        $validate = $request->validate([
            "name"=>  ['required'],
            "username" => ['required', 'min:2', 'max:100', 'unique:users'],
            "password"=>['required', 'confirmed', 'max:255'],
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'diskon' => $request->diskon,
            'role' => 'petugas',
        ]);
        Alert::success('Berhasil','data berhasil ditambahkan');

        return back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function editPetugas(Request $request, $id)
    {
        $petugas =User::find($id);
        $petugas->name = $request->input('name');
        $petugas->username = $request->input('username');
        $petugas->password = $request->input('password');
        $petugas->update();
        Alert::success('Berhasil','data berhasil diedit');
        return back();
    }

    public function deletePetugas(Request $request, $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(petugas $petugas)
    {
        //
    }
}
