<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubClosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_clo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_clo');
            $table->string('indikator');
            $table->string('skor_1_20');
            $table->string('skor_21_40');
            $table->string('skor_41_60');
            $table->string('skor_61_80');
            $table->string('skor_81_100');
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
        Schema::dropIfExists('sub_clo');
    }
}
