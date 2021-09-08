<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoblacionInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poblacion_institucion', function (Blueprint $table) {
            $table->id();
            $table->string('estado');

            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_poblacion');

            $table->foreign('id_institucion')->references('id')->on('institucions');
            $table->foreign('id_poblacion')->references('id')->on('poblacions');
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
        Schema::dropIfExists('poblacion_institucion');
    }
}
