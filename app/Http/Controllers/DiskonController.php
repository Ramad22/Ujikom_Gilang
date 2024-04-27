<?php

namespace App\Http\Controllers;

use App\Models\diskon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function diskon()
    {
        $potong = diskon::all();
        return view('admin.diskon', compact('potong'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addDiskon(Request $request)
    {
        $diskon = diskon::first();
        $minimal = str_replace('.', '', $request->minimal_diskon);
        if($diskon){
            $diskon->update([
                'minimal_diskon' =>$minimal,
            ]);
            Alert::success('Berhasil','data berhasil ditambahkan');
            return back();
        }else{
            diskon::create([
                'minimal_diskon' => $minimal,
            ]);
            Alert::success('Berhasil','data berhasil ditambahkan');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(diskon $diskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(diskon $diskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, diskon $diskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(diskon $diskon)
    {
        //
    }
}
