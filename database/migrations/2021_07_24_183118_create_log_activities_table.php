<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_pemb_akd');
            $table->unsignedBigInteger('id_pemb_lap');
            $table->date('tanggal');
            $table->time('jam_datang');
            $table->time('jam_pulang');
            $table->string('aktivitas');
            $table->string('evaluasi')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pemb_akd')->references('id')->on('pembimbing_akademik')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('log_activity');
    }
}
