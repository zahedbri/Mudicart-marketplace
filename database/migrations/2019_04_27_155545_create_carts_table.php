<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_keranjang_belanja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pembeli_id');
            $table->foreign('pembeli_id')->references('id')->on('tb_pembeli');
            $table->boolean('telah_diselesaikan');
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
        Schema::dropIfExists('tb_keranjang_belanja');
    }
}
