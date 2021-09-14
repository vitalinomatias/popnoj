<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturaInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobertura_institucion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_pais');
            $table->unsignedBigInteger('id_departamento');
            $table->unsignedBigInteger('id_municipio');

            $table->foreign('id_institucion')->references('id')->on('institucions');
            $table->foreign('id_pais')->references('id')->on('pais');
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->foreign('id_municipio')->references('id')->on('municipios');


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
        Schema::dropIfExists('cobertura_institucion');
    }
}
