<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->on('medico')->references('id');
            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->on('pacientes')->references('id');

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
        Schema::dropIfExists('consulta');
    }
}
