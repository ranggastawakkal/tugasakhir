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
            $table->unsignedBigInteger('id_sub_clo')->unique();
            $table->double('bobot');
            $table->timestamps();

            $table->foreign('id_sub_clo')->references('id')->on('sub_clo')->onUpdate('cascade')->onDelete('cascade');
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
