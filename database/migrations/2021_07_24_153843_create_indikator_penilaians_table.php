<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator_penilaian', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_clo');
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
        Schema::dropIfExists('indikator_penilaian');
    }
}
