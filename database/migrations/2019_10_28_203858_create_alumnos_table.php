<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('programa_educativo_id');
            $table->string('nombre');
            $table->unsignedInteger('codigo')->unique();
            $table->string('correo')->unique();
            $table->date('fecha_nacimiento');
            $table->timestamps();

            $table->foreign('programa_educativo_id')
                ->references('id')
                ->on('programas_educativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
