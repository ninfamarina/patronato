<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkAcreditacionTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talleres', function (Blueprint $table) {
            $table->unsignedBigInteger('acreditacion_id');
            $table->foreign('acreditacion_id')->references('id')->on('acreditaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talleres', function (Blueprint $table) {
            $table->dropForeign(['acreditacion_id']);

        });
    }
}
