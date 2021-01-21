<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeguroMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seguroMedico = [
        	array("nombre" => 'Sin servicio'),
        	array("nombre" => 'ISSSTE'),
        	array("nombre" => 'IMSS'),
        	array("nombre" => 'Seguro popular'),
        ];

        DB::table('seguro_medico')->insert($seguroMedico);
    }
}
