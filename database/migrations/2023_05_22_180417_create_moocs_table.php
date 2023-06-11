<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moocs', function (Blueprint $table) {
            $table->id('id_mooc');
            $table->string('nombre');
            $table->string('ruta');
            $table -> string('credito');
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
        Schema::dropIfExists('moocs');
    }
}
