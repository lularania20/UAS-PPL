<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            // $table->string('id_kategori_paket')->nullable()->constrained('kategori_paket');
            $table->string('id_wisata_1')->nullable()->constrained('wisata');
            $table->string('id_wisata_2')->nullable()->constrained('wisata');
            $table->string('id_wisata_3')->nullable()->constrained('wisata');
            $table->string('harga_paket');
            $table->string('deskripsi_paket');
            $table->string('foto_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_wisata');
    }
}
