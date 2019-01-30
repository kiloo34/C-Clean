<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total');
            $table->text('deskripsi')->nullable();
            $table->date('tgl_selesai');
            $table->integer('id_member')->unsigned();
            $table->foreign('id_member')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_admin')->unsigned();
            $table->foreign('id_admin')->references('id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('order');
    }
}
