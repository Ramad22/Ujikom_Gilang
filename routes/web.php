<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProdukController;
use App\Models\detail_penjualan;
use App\Models\diskon;
use App\Models\penjualan;
use App\Models\petugas;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('prosesLogin', [AuthController::class,'prosesLogin'])->name('prosesLogin');

Route::middleware(['auth' =>'role:admin'])->group(function () {
    Route::get('admin.dashboard', [AuthController::class,'adminDashboard'])->name('admin.dashboard')->middleware('auth');
    Route::get('admin.petugas', [PetugasController::class,'adminpetugas'])->name('admin.petugas');
    Route::get('admin.member', [PelangganController::class,'adminMember'])->name('admin.member');
    Route::get('admin.produk', [ProdukController::class,'adminProduk'])->name('admin.produk');
    Route::get('admin.transaksi', [AuthController::class,'adminTransaksi'])->name('admin.transaksi');
    Route::get('admin.laporan', [LaporanController::class,'adminLaporan'])->name('admin.laporan');
    Route::get('admin.diskon', [DiskonController::class,'diskon'])->name('admin.diskon');
    Route::get('admin.profile', [AuthController::class,'profile'])->name('admin.profile');

});
Route::middleware(['auth' => 'role:petugas'])->group(function () {
    Route::get('petugas.dashboard', [AuthController::class,'petugasDashboard'])->name('petugas.dashboard');
    Route::get('petugas.member', [PelangganController::class,'petugasMember'])->name('petugas.member');
    Route::get('petugas.transaksi', [DetailPenjualanController::class,'petugasTransaksi'])->name('petugas.transaksi');
    Route::get('petugas.produk', [ProdukController::class,'petugasProduk'])->name('petugas.produk');
    Route::get('petugas.laporan', [LaporanController::class,'petugasLaporan'])->name('petugas.laporan');
    Route::get('petugas.hasil-transaksi', [PenjualanController::class,'hasil'])->name('petugas.hasil-transaksi');
    Route::get('petugas.profile', [AuthController::class,'Pprofile'])->name('petugas.profile');


});


Route::get('cetak/{penjualan_id}', [PenjualanController::class,'cetak'])->name('cetak')->middleware('auth');
Route::post('addDiskon', [DiskonController::class,'addDiskon'])->name('addDiskon');

Route::get('filter', [LaporanController::class,'filter'])->name('filter');




Route::post('addMember', [PelangganController::class,'addMember'])->name('addMember');
Route::post('editMember/{id}', [PelangganController::class,'editMember'])->name('editMember');
Route::get('deleteMember/{id}', [PelangganController::class,'deleteMember'])->name('deleteMember');

Route::post('addProduk', [ProdukController::class,'addProduk'])->name('addProduk');
Route::post('editProduk/{id}', [ProdukController::class,'editProduk'])->name('editProduk');
Route::get('deleteProduk/{id}', [ProdukController::class,'deleteProduk'])->name('deleteProduk');

Route::post('addPetugas', [PetugasController::class,'addPetugas'])->name('addPetugas');
Route::post('editPetugas/{id}', [PetugasController::class,'editPetugas'])->name('editPetugas');
Route::get('deletePetugas/{id}', [PetugasController::class,'deletePetugas'])->name('deletePetugas');

Route::post('addKeranjang', [DetailPenjualanController::class,'addKeranjang'])->name('addKeranjang');
Route::post('addKBayar', [DetailPenjualanController::class,'addBayar'])->name('addBayar');
Route::get('deleteDetail/{id}', [DetailPenjualanController::class,'deleteDetail'])->name('deleteDetail');


