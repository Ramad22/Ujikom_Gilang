<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id('detail_id');
            $table->integer('penjualan_id')->nullable();
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlah_produk');
            $table->decimal('subtotal', 10,2);
            $table->enum('status', ['proses','berhasil'])->default('proses');
            $table->foreign('penjualan_id')->references('penjualan_id')->on('penjualans')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
