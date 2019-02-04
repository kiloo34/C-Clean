<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_akses', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(false);
            $table->integer('id_role')->unsigned()->nullable();
            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade');
            $table->integer('id_detail')->unsigned()->nullble();
            $table->foreign('id_detail')->references('id')->on('detail_akses')->onDelete('cascade');
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
        Schema::dropIfExists('role_akses');
    }
}
