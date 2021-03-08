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
    		["nombre" => "Comondú", "num_coordinacion" => 1, "municipios" => "Comondú",
             "nombre_encargado" => "Juan", "numero_celular" => "6121349805", "email" =>"juan@hotmail.com"],   
    		["nombre" => "Mulegé", "num_coordinacion" => 2, "municipios" => "Mulegé", 
              "nombre_encargado" => "manuel", "numero_celular" => "6121399900", "email" =>"manuel12@hotmail.com"],
    		["nombre" => "La Paz I", "num_coordinacion" => 3, "municipios" => "La Paz",
            "nombre_encargado" =>"Ana Puala", "numero_celular" => "6121494567", "email"=>"anapaula13@hotmail.com"],
    		["nombre" => "La Paz II", "num_coordinacion" => 4, "municipios" => "La Paz",
            "nombre_encargado"=> "mario", "numero_celular" => "6124579642", "email" => "mario2@hotmail.com"],
    		["nombre" => "San Jose", "num_coordinacion" => 5, "municipios" => "Los Cabos","nombre_encargado"=> "maria", "numero_celular" => "6124857392", "email" => "maria@hotmail.com"],
    		["nombre" => "Cabo San Lucas", "num_coordinacion" => 6, "municipios" => "Los Cabos", "nombre_encargado"=> "jaunito", "numero_celular" => "6123459020", "email" => "juanito@hotmail.com"],
    		["nombre" => "Mulegé", "num_coordinacion" => 7, "municipios" => "Mulegé",    "nombre_encargado"=> "kasin", "numero_celular" => "6123479404", "email" => "kasin@hotmail.com"],

    	);

    	for($i = 0; $i < count($coordinacionDeZonas); $i++) {
    		$municipio = DB::table('municipios')
    			->select('id')
    			->where('nombre', $coordinacionDeZonas[$i]["municipios"])->first();
	        DB::table('coordinacionDeZona')->insert([
            'nombre' => $coordinacionDeZonas[$i]["nombre"],
            'num_coordinacion' => $coordinacionDeZonas[$i]["num_coordinacion"],
            'municipio_id' => $municipio->id,
            'nombre_encargado'=> $coordinacionDeZonas[$i]["nombre_encargado"],
            'numero_celular' => $coordinacionDeZonas[$i]["numero_celular"],
            'email'=> $coordinacionDeZonas[$i]["email"]
        ]);
    	}
        
    }
}
