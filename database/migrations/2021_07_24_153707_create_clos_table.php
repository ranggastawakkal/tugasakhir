<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clo', function (Blueprint $table) {
            $table->id();
            $table->string('kode_clo');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_plo');
            $table->timestamps();

            $table->foreign('id_plo')->references('id')->on('plo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clo');
    }
}
