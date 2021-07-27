<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->unique();
            $table->string('surat_diterima')->nullable();
            $table->string('laporan')->nullable();
            $table->string('surat_selesai')->nullable();
            $table->string('krs')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
