<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminLaporan(){
        $laporan = laporan::all();
        $penjualan = penjualan::all();
        return view("admin.laporan", compact('laporan', 'penjualan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function petugasLaporan(){
        $laporan = laporan::paginate(10);
        return view("petugas.laporan", compact('laporan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function filter(Request $request)
    {
        $start_date = $request->input('start_date', '');
        $end_date = $request->input('end_date', '');
        $laporan = laporan::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('petugas.laporan', compact('start_date', 'end_date', 'laporan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laporan $laporan)
    {
        //
    }
}
