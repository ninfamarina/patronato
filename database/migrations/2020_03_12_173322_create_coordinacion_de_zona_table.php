<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinacionDeZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinacionDeZona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nombre',45);
            $table->Integer('num_coordinacion');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->String('nombre_encargado',45)->nullable();
            $table->String('apellido_paterno',40)->nullable();
            $table->String('apellido_materno',40)->nullable();
            $table->String('numero_celular',10)->nullable();
            $table->String('email',50)->nullable();
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
        Schema::dropIfExists('coordinacionDeZona');
    }
}
