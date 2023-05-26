<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisata extends Migration
{
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('id_kategori_wisata')->nullable()->constrained('kategori_wisata');
            $table->string('deskripsi_wisata', 1000);
            $table->string('harga_wisata');
            $table->string('gambar_wisata');
            $table->string('alamat_wisata');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}