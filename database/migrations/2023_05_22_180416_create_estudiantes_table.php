<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiante');
            $table->string('nombre_estudiante');
            $table->string('apellidoPaterno_estudiante');
            $table->string('apellidoMaterno_estudiante');
            $table->unsignedBigInteger('numero_control')->digits(20);
            $table->unsignedBigInteger('telefono_celular')->digits(20);
            $table->string('carrera');
            $table->date('fecha_nacimiento');
            $table->string('escuela_procedencia');
            $table->date('fecha_registro');
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
        Schema::dropIfExists('estudiantes');
    }
}
