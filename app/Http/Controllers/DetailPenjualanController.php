<?php

namespace App\Http\Controllers;

use App\Models\detail_penjualan;
use App\Models\diskon;
use App\Models\laporan;
use App\Models\pelanggan;
use App\Models\penjualan;
use App\Models\produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function petugasTransaksi(){
        $produk = produk::all();
        $detail = detail_penjualan::where('status', 'proses')->get();
        $member = pelanggan::all();
        $diskon = diskon::all();
        $total = detail_penjualan::where('status', 'proses')->sum('subtotal');
        return view("petugas.transaksi", compact('produk', 'detail', 'member','total', 'diskon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deleteDetail(Request $request, $detail_id)
    {
        $detail = detail_penjualan::findOrFail($detail_id);
        $detail->delete();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addKeranjang(Request $request)
    {

        $detail = detail_penjualan::where('produk_id', $request->produk_id)->where('status', 'proses')->first();
        if($detail){
            $jumlahBaru = $detail->jumlah_produk + $request->jumlah_produk;
            $subBaru = $detail->subtotal + ($request->jumlah_produk * $detail->subtotal);
            $detail->update([
                'jumlah_produk' => $jumlahBaru,
                'subtotal' => $subBaru
            ]);
            laporan::updateOrCreate(
                ['produk_id' => $detail->produk_id],
                ['stok_keluar' => $jumlahBaru],
            );
         }else{
            $produk_id = $request->produk_id;
            $jumlah = $request->jumlah_produk;
            $subtotal = str_replace('.', '', $request->subtotal);
            detail_penjualan::create([
                'produk_id' => $produk_id,
                'jumlah_produk' => $jumlah,
                'subtotal'=> $subtotal,
                'status'=> 'proses',
            ]);
            laporan::updateOrCreate(
                ['produk_id' => $produk_id],
                ['stok_keluar' => DB::raw('IFNULL(stok_keluar, 0) + ' . $jumlah)]
            );
         }

         return back();
    }

    /**
     * Display the specified resource.
     */
    public function addBayar(Request $request)    {
        $validate = $request->validate([
            'bayar'=> 'nullable|numeric',
        ]);
        $acak = mt_rand(10000, 100000 );

        $total = str_replace('.', '', $request->total);
        $bayar = str_replace('.', '', $request->bayar);
        $kembalian = str_replace('.', '', $request->kembalian);



        penjualan::create([
            'penjualan_id' => $acak,
            'tanggal_penjualan'=> Carbon::now(),
            'total' => $total,
            'bayar'=> $bayar,
            'kembalian' => $kembalian,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        detail_penjualan::whereNull('penjualan_id', $request->penjualan_id)->update(['penjualan_id'=>$acak]);
        detail_penjualan::where('status', 'proses', $acak)->update(['status'=>'berhasil']);
        Alert::success('Berhasil', 'Transaksi telah dilakukan');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detail_penjualan $detail_penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detail_penjualan $detail_penjualan)
    {
        //
    }
}
// BEGIN
//     DECLARE perbedaan INT;
//     SET perbedaan = NEW.jumlah_produk - OLD.jumlah_produk;
//     UPDATE produks SET stok = stok - perbedaan WHERE id = NEW.produk_id;
// END
