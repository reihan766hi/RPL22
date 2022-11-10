<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarBus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_buses', function (Blueprint $table) {
            $table->id();
            $table->string("jenis");
            $table->string("kode_bus");
            $table->string("pabrikan");
            $table->string("no_mesin");
            $table->string("plat_nomor");
            $table->string("kode_area");
            $table->string("gambar_bus");
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
        Schema::dropIfExists('daftar_buses');
    }
}
