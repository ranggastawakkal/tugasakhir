<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotPembAkdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_pemb_akd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_indikator')->unique();
            $table->double('bobot');
            $table->timestamps();

            $table->foreign('id_indikator')->references('id')->on('indikator_penilaian')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobot_pemb_akd');
    }
}
