<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escolaridad = [
        	array("nombre" => 'Sin estudios'),
        	array("nombre" => 'Primaria'),
        	array("nombre" => 'Secundaria'),
        	array("nombre" => 'Preparatoria'),
        	array("nombre" => 'Licenciatura'),
        	array("nombre" => 'Maestria'),
        	array("nombre" => 'Doctorado')
        ];

        DB::table('escolaridad')->insert($escolaridad);
    }
}
