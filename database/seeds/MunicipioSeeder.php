<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$municipios = array("Mulegé ", "Loreto", "Comondú", "La Paz", "Los Cabos");
    	for($i = 0; $i < count($municipios); $i++) {
	        DB::table("municipios")
	        ->insert(array("nombre" => $municipios[$i]));
    	}
    }
}
