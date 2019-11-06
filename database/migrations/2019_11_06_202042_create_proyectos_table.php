<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_proyecto');
            $table->timestamps();
        });

        Schema::create('alumno_proyecto', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('proyecto_id');

            $table->foreign('alumno_id')
              ->references('id')
              ->on('alumnos')
              ->onDelete('cascade');

            $table->foreign('proyecto_id')
              ->references('id')
              ->on('proyectos')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_proyecto');
        Schema::dropIfExists('proyectos');
    }
}
