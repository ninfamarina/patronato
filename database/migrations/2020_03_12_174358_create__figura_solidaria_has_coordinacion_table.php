<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiguraSolidariaHasCoordinacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FiguraSolidaria_has_coordinacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('figuraSolidaria_id');
            $table->unsignedBigInteger('coordinacionDeZona_id');
            $table->foreign('figuraSolidaria_id')->references('id')->on('figuras_solidarias');
            $table->foreign('coordinacionDeZona_id')->references('id')->on('coordinacionDeZona');
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
        Schema::dropIfExists('FiguraSolidaria_has_coordinacion');
    }
}
