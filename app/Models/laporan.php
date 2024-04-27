<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id',
        'nama_produk',
        'stok_keluar',
        'stok_masuk',
    ];
    protected $table = 'laporans';
    protected $primaryKey = 'produk_id';

    public function produk(){
        return $this->belongsTo(produk::class, 'produk_id','id');
    }
}
