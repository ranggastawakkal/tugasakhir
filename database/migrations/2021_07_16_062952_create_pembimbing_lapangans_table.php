<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing_lapangan', function (Blueprint $table) {
            $table->id();
            $table->integer('nip')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('jabatan');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('kota_perusahaan');
            $table->string('email_perusahaan')->nullable();
            $table->string('no_telepon_perusahaan')->nullable();
            $table->string('plain_password')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('pembimbing_lapangan');
    }
}
