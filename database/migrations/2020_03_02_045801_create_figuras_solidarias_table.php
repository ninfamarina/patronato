<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFigurasSolidariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figuras_solidarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('curp', 18);
            $table->char('rfc', 18);
            $table->string('nombre', 60);
            $table->string('apellido_paterno', 45);
            $table->string('apellido_materno', 45)->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->string('domicilio', 80);
            $table->string('colonia',40);
            $table->integer('hijos');
            $table->char('codigo_postal',7);
            $table->char('telefono',15);
            $table->date('fecha_registro');
            $table->date('fecha_incorporacion');
            $table->string('carta_compromiso',250);
            $table->string('ine',250);
            $table->string('acta_nacimiento',250);
            $table->string('comprobante_estudio',250);
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
        Schema::dropIfExists('figuras_solidarias');
    }
}