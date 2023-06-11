<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('telefono_celular')->digits(20);
            $table->unsignedBigInteger('numero_control')->digits(20);
            $table->unsignedInteger('semestre');
            $table->string('carrera');
            $table->string('abreviatura_carrera');
            $table->string('periodo');
            $table->string('escuela_procedencia');
            $table->date('fecha_registro');
            $table->string('ubicacion');
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
