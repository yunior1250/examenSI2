<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntfamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antfamiliares', function (Blueprint $table) {
            $table->id();
            $table->string('inspecciongeneral');
            $table->string('peso');
            $table->string('altura');
            $table->string('temperatura');
            $table->string('aspecto');
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
        Schema::dropIfExists('antfamiliares');
    }
}
