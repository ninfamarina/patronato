<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkFiguraSolidariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('figuras_solidarias', function (Blueprint $table) {
            $table->unsignedBigInteger('seguro_medico_id');
            $table->unsignedBigInteger('escolaridad_id')->nullable();
            $table->unsignedBigInteger('registro_civil_id');
            $table->foreign('seguro_medico_id')->references('id')->on('seguro_medico');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridad');
            $table->foreign('registro_civil_id')->references('id')->on('registro_civil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('figuras_solidarias', function (Blueprint $table) {
            $table->dropForeign(['seguro_medico_id', 'escolaridad_id',  'registro_civil_id']);
        });
    }
}
