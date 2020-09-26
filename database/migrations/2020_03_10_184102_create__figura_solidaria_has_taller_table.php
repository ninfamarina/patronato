<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiguraSolidariaHasTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FiguraSolidaria_has_taller', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('porcentaje');
            $table->unsignedBigInteger('figuraSolidaria_id');
            $table->unsignedBigInteger('taller_id');
            $table->foreign('figuraSolidaria_id')->references('id')->on('figuras_solidarias');
            $table->foreign('taller_id')->references('id')->on('talleres');
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
        Schema::dropIfExists('FiguraSolidaria_has_modulo');
    }
}
