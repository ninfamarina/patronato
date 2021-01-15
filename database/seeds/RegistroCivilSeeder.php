<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registroCivil = [
        	array("nombre" => 'Soltero (a)'),
        	array("nombre" => 'Casado (a)'),
        	array("nombre" => 'Divorsiado (a)'),
        	array("nombre" => 'Viudo (a)'),

        ];

        DB::table('registro_civil')->insert($registroCivil);
    }
}
