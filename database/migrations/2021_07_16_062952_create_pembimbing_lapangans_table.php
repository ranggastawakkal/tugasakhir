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
            $table->integer('nip');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('perusahaan');
            $table->string('posisi');
            $table->string('image');
            $table->string('password');
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
        Schema::dropIfExists('pembimbing_lapangan');
    }
}
