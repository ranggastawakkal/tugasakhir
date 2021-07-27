<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianPembimbingLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_pembimbing_lapangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->unique();
            $table->unsignedBigInteger('id_pemb_lap');
            $table->integer('kehadiran');
            $table->integer('kedisiplinan');
            $table->integer('komitmen');
            $table->integer('log_activity');
            $table->integer('bimbingan');
            $table->integer('presentasi');
            $table->integer('laporan');
            $table->integer('formulasi_masalah');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pemb_lap')->references('id')->on('pembimbing_lapangan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_pembimbing_lapangan');
    }
}
