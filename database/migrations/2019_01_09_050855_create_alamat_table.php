<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nama');
            $table->char('id_provinsi');
            $table->foreign('id_provinsi')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');
            $table->char('id_kabupaten');
            $table->foreign('id_kabupaten')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->char('id_kecamatan');
            $table->foreign('id_kecamatan')->references('id')->on('districts')->onUpdate('cascade')->onDelete('cascade');
            $table->char('id_desa');
            $table->foreign('id_desa')->references('id')->on('villages')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('alamat');
    }
}
