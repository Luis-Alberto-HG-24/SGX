<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditoDeportivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credito_deportivo', function (Blueprint $table) {
            $table->id('id_creditoDeportivo');
            $table->string('estado');
            $table->date('fecha_registro');
            $table->integer('total_horas');
            $table->foreignId('id_estudiante_fk')->constrained('estudiantes', 'id_estudiante');
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
        Schema::dropIfExists('credito_deportivo');
    }
}
