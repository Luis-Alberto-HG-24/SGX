<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditoCivicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credito_civico', function (Blueprint $table) {
            $table->id('id_creditoCivico');
            $table->string('estado')->nullable();
            $table->date('fecha_registro')->nullable();
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
        Schema::dropIfExists('credito_civico');
    }
}
