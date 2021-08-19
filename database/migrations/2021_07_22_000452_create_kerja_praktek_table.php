<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjaPraktekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerja_praktek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->unique();
            $table->unsignedBigInteger('id_pemb_akd')->nullable();
            $table->unsignedBigInteger('id_pemb_lap')->nullable();
            $table->string('unit_kerja')->nullable()->default('-');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->text('target')->nullable()->default("-");
            $table->text('program_kegiatan')->nullable()->default("-");
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
        Schema::dropIfExists('kerja_praktek');
    }
}
