<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan')->nullable()->constrained('pelanggan');
            $table->string('id_paket')->nullable()->constrained('paket_wisata');
            $table->string('id_status')->nullable()->constrained('status');
            $table->string('keterangan_pembayaran')->nullable();
            $table->date('tanggal_keberangkatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
