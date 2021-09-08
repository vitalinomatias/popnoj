<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_institucion');
            $table->string('director');
            $table->string('contacto');
            $table->string('cargo');
            $table->string('telefono');
            $table->string('correo');
            $table->string('direciion_local');
            $table->string('direciion_central');
            $table->integer('estado');

            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')
                    ->references('id')
                    ->on('tipos');



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
        Schema::dropIfExists('institucions');
    }
}
