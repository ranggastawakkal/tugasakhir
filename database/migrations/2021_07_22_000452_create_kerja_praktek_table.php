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
            $table->integer('nim');
            $table->integer('nip_pemb_akd');
            $table->integer('nip_pemb_lap')->nullable()->nullable();
            $table->string('lokasi_kerja')->nullable();
            $table->string('unit')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->string('surat_diterima')->nullable();
            $table->string('surat_selesai')->nullable();
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip_pemb_akd')->references('nip')->on('pembimbing_akademik')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip_pemb_lap')->references('nip')->on('pembimbing_lapangan')->onUpdate('cascade')->onDelete('cascade');
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
