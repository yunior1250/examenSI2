<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHismedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hismedico', function (Blueprint $table) {
            $table->id();

            $table->date('fechanaci');
            $table->string('ocupacion');
            $table->string('estadocivil');

//$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->on('pacientes')->references('id')->onDelete('cascade') ;

            $table->unsignedBigInteger('id_antpersonales');
            $table->foreign('id_antpersonales')->on('antpersonales')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('id_antfamiliares');
            $table->foreign('id_antfamiliares')->on('antfamiliares')->references('id')->onDelete('cascade');


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
        Schema::dropIfExists('hismedico');
    }
}
