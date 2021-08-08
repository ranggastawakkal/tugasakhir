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
            $table->text('deskripsi');
            $table->double('porsi');
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
        Schema::dropIfExists('sub_clo');
    }
}
