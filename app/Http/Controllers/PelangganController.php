<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminMember(){
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $pelanggan = pelanggan::paginate(10);
        return view("admin.member",compact('pelanggan'));
    }
    public function petugasMember(){
        $pelanggan = pelanggan::paginate(10);
        return view("petugas.member",compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addMember(Request $request)
    {
        $validate = $request->validate([
            'nama_pelanggan'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
        ]);
        pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        Alert::success('Berhasil','data berhasil ditambahkan');
        return back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function editMember(Request $request, $id)
    {
        $pelanggan =pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->no_hp = $request->input('no_hp');
        $pelanggan->update();
        Alert::success('Berhasil','data berhasil diedit');
        return back();
    }

    public function deleteMember(Request $request, $id)
    {
        $member = Pelanggan::findOrFail($id);
        $member->delete();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
