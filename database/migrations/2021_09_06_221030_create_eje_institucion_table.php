<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjeInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eje_institucion', function (Blueprint $table) {
            $table->id();

            $table->string('estado');

            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_eje');

            $table->foreign('id_institucion')->references('id')->on('institucions');
            $table->foreign('id_eje')->references('id')->on('ejes');

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
        Schema::dropIfExists('eje_institucion');
    }
}
