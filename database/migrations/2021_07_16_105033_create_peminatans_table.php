<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('id_kk');
            $table->unsignedBigInteger('id_prodi');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id')->on('program_studi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kk')->references('id')->on('kelompok_keahlian')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminatan');
    }
}
