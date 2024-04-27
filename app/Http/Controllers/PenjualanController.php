<?php

namespace App\Http\Controllers;

use App\Models\detail_penjualan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hasil(Request $request)
     {
       $penjualan =penjualan::orderBy('created_at', 'desc')->get();
       return view('petugas.hasil-transaksi', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cetak(Request $request, $penjualan_id)
    {
        $penjualan = penjualan::findOrFail($penjualan_id);
        $detail = detail_penjualan::where('penjualan_id', $penjualan_id)->get();
        return view('cetak', compact('penjualan', 'detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}
