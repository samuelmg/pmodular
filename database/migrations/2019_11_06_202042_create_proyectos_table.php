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
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_proyecto');
            $table->text('descripcion');
            $table->string('estatus', 30)->default('');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
              ->references('id')
              ->on('users');
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
