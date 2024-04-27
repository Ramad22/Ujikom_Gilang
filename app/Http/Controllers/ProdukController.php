<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function petugasProduk(){
        $produk = Produk::paginate(10);
        return view("petugas.produk", compact('produk'));
    }
    public function adminProduk(){
        $produk = Produk::paginate(10);
        return view("admin.produk", compact('produk'));
    }

    public function addProduk(Request $request)
    {
        $validate = $request->validate([
            'nama_produk'=> 'required| unique:produks,nama_produk',
            'harga'=> 'required|numeric',
            'stok'=> 'required|numeric',
            'diskon'=> 'nullable|numeric',
        ]);

        $harga = str_replace('.', '',$request->harga);
        produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $harga,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
        ]);
        laporan::create([
            'produk_id' => $request->id,
            'nama_produk' => $request->nama_produk,
            'stok_masuk' => $request->stok,
            'stok' => $request->stok,
        ]);
        Alert::success('Berhasil','data berhasil ditambahkan');
        return back();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function editProduk(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_produk'=> 'required| unique:produks,nama_produk',
        ]);
        $produk =produk::find($id);
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->diskon = $request->input('diskon');
        $produk->update();
        Alert::success('Berhasil','data berhasil diedit');
        return back();
    }

    public function deleteProduk(Request $request, $id)
    {
        $produk = produk::findOrFail($id);
        $produk->delete();
        return back();
    }


//     BEGIN
//   UPDATE produks set stok = stok + OLD.jumlah_produk WHERE id = OLD.produk_id;
// END
    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }
}
