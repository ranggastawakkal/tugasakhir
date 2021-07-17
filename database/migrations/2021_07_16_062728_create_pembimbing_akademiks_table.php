<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing_akademik', function (Blueprint $table) {
            $table->integer('nip');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('kode_dosen');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_telepon');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('image');
            $table->string('password');
            $table->string('level')->default('Pembimbing Akademik');
            $table->timestamps();

            $table->primary('nip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembimbing_akademik');
    }
}
