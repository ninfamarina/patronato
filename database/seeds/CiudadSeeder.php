<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = [
        	array("nombre" => 'Bahia Asuncion', "municipio" => "Mulegé"),
        	array("nombre" => 'Bahia Tortugas', "municipio" => "Mulegé"),
        	array("nombre" => 'Benito Juarez', "municipio" => "Mulegé"),
        	array("nombre" => 'Cabo San Lucas', "municipio" => "Los Cabos"),
        	array("nombre" => 'Chametla', "municipio" => "La Paz"),
        	array("nombre" => 'Ciudad Constitucion', "municipio" => "Comondú"),
        	array("nombre" => 'Clave 15', "municipio" => "Mulegé"),
        	array("nombre" => 'Ejido. Alfredo V. Bonfil', "municipio" => "La Paz"),
        	array("nombre" => 'Ejido. San lucas', "municipio" => "Mulegé"),
        	array("nombre" => 'El Rosario', "municipio" => "Comondú"),
        	array("nombre" => 'Guerrero negro', "municipio" => "Mulegé"),
        	array("nombre" => 'Gustavo Diaz ordaz', "municipio" => "Mulegé"),
        	array("nombre" => 'Heroica mulege', "municipio" => "Mulegé"),
        	array("nombre" => 'La Altagracia', "municipio" => "Loreto"),
        	array("nombre" => 'La Paz', "municipio" => "La Paz"),
        	array("nombre" => 'La Poza grande', "municipio" => "Comondú"),
        	array("nombre" => 'Las Barrancas', "municipio" => "Comondú"),
        	array("nombre" => 'Loreto', "municipio" => "Loreto"),
        	array("nombre" => 'Miraflores', "municipio" => "Los Cabos"),
        	array("nombre" => 'Mulege', "municipio" => "Mulegé"),
        	array("nombre" => 'Puerto San Carlos', "municipio" => "Comondú"),
        	array("nombre" => 'San Bruno', "municipio" => "Mulegé"),
        	array("nombre" => 'San Ignacio', "municipio" => "Mulegé"),
        	array("nombre" => 'San Isidro', "municipio" => "Comondú"),
        	array("nombre" => 'San Jose del Cabo', "municipio" => "Los Cabos"),
        	array("nombre" => 'San Juanico', "municipio" => "Comondú"),
        	array("nombre" => 'San Luis Gonzaga', "municipio" => "Comondú"),
        	array("nombre" => 'San Miguel de Comondu', "municipio" => "Comondú"),
        	array("nombre" => 'Santa Rosalia', "municipio" => "Mulegé"),
        	array("nombre" => 'Santiago', "municipio" => "Los Cabos"),
        	array("nombre" => 'Villa Alberto A.A.A', "municipio" => "Mulegé"),
        	array("nombre" => 'Villa Alberto Andres A.A', "municipio" => "Mulegé"),
        	array("nombre" => 'Villa Alberto Andres Alvarado', "municipio" => "Mulegé"),
        	array("nombre" => 'Villa Hidalgo', "municipio" => "Comondú"),
        	array("nombre" => 'Villa Morelos', "municipio" => "Comondú"),



        






        ];

        for($i = 0; $i < count($ciudades); $i++) {
        	$municipio = DB::table("municipios")
        		->select("id")
        		->where("nombre", $ciudades[$i]["municipio"])->first();
        	DB::table('ciudades')->insert([
        		'nombre' => $ciudades[$i]["nombre"],
        		'municipio_id' =>  $municipio->id
        	]);
        }
    }
}
