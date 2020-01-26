<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_jenis')->unsigned();
            $table->bigInteger('id_harga')->unsigned();
            $table->integer('jumlah');
            $table->double('total');
            $table->string('kode_pelanggan');
            $table->timestamps();
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->foreign('id_harga')->references('id')->on('harga')->onDelete('cascade');
            $table->foreign('kode_pelanggan')->references('kode')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
