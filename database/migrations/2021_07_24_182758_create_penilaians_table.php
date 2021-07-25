<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->unique();
            $table->unsignedBigInteger('id_pemb_akd');
            $table->integer('komitmen');
            $table->integer('log_activity');
            $table->integer('bimbingan');
            $table->integer('presentasi');
            $table->integer('laporan');
            $table->integer('formulasi_masalah');
            $table->integer('nilai_pemb_akd');
            $table->integer('nilai_pemb_lap');
            $table->integer('nilai_total');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pemb_akd')->references('id')->on('pembimbing_akademik')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
