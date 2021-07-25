<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_clo');
            $table->integer('pembimbing_akademik');
            $table->integer('pembimbing_lapangan');
            $table->timestamps();

            $table->foreign('id_clo')->references('id')->on('clo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobot_penilaian');
    }
}
