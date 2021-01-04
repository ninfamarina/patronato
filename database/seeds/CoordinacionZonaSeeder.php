<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordinacionZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$coordinacionDeZonas = array(
    		["nombre" => "Comondú", "num_coordinacion" => 1, "municipios" => "Comondú"],
    		["nombre" => "Mulegé", "num_coordinacion" => 2, "municipios" => "Mulegé"],
    		["nombre" => "La Paz I", "num_coordinacion" => 3, "municipios" => "La Paz"],
    		["nombre" => "La Paz II", "num_coordinacion" => 4, "municipios" => "La Paz"],
    		["nombre" => "San Jose", "num_coordinacion" => 5, "municipios" => "Los Cabos"],
    		["nombre" => "Cabo San Lucas", "num_coordinacion" => 6, "municipios" => "Los Cabos"],
    		["nombre" => "Mulegé", "num_coordinacion" => 7, "municipios" => "Mulegé"],

    	);

    	for($i = 0; $i < count($coordinacionDeZonas); $i++) {
    		$municipio = DB::table('municipios')
    			->select('id')
    			->where('nombre', $coordinacionDeZonas[$i]["municipios"])->first();
	        DB::table('coordinacionDeZona')->insert([
            'nombre' => $coordinacionDeZonas[$i]["nombre"],
            'num_coordinacion' => $coordinacionDeZonas[$i]["num_coordinacion"],
            'municipio_id' => $municipio->id,
        ]);
    	}
        
    }
}
