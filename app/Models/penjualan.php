<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['penjualan_id', 'tanggal_penjualan', 'total', 'bayar', 'kembalian', 'pelanggan_id'];
    protected $table = 'penjualans';

    protected $primaryKey = 'penjualan_id';

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'pelanggan_id','id');
    }
    public function produk(){
        return $this->belongsTo(produk::class, 'produk_id','id');
    }
}
