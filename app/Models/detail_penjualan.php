<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualans';
    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'jumlah_produk',
        'subtotal',
        'status',
    ];
    protected $primaryKey = 'detail_id';

    public function produk(){
        return $this->belongsTo(produk::class,'produk_id');
    }
    public function pelanggan(){
        return $this->belongsTo(pelanggan::class,'pelanggan_id', 'id');
    }
    public function penjualan(){
        return $this->belongsTo(penjualan::class,'penjualan_id');
    }
}
