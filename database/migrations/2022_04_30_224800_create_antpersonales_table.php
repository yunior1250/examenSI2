<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntpersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antpersonales', function (Blueprint $table) {
            $table->id();
            $table->string('alcohol');
            $table->string('tabaco');
            $table->string('droga');
            $table->string('infuciones');
            $table->string('alimentacion');
            $table->string('sueño');
            $table->string('sexualidad');
            $table->string('enfermedadesinfancia');
            $table->string('respiratorio');
            $table->string('traumatologico');
            $table->string('quirurgicos');
            $table->string('alergicos');
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
        Schema::dropIfExists('antpersonales');
    }
}
