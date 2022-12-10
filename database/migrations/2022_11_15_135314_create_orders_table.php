<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("email");
            $table->string("notelp");
            $table->string("id_produks");
            $table->string("kode_area");
            $table->string("kode_bus");
            $table->string("harga");
            $table->string("sifat_pemesanan");
            $table->date("jadwal");
            $table->string("bukti_pembayaran")->nullable();
            $table->string("status")->nullable()->default("belum bayar");
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
        Schema::dropIfExists('orders');
    }
}
