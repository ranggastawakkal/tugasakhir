<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plo', function (Blueprint $table) {
            $table->id();
            $table->string('kode_plo');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_prodi');
            $table->timestamps();

            $table->foreign('id_periode')->references('id')->on('periode')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('program_studi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plo');
    }
}
