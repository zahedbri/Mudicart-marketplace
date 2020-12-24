<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_belanjaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('keranjang_id');
            $table->foreign('keranjang_id')->references('id')->on('tb_keranjang_belanja');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('tb_produk');
            $table->integer('jumlah');
            $table->integer('harga');
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
        Schema::dropIfExists('tb_belanjaan');
    }
}
