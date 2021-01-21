<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $rol = [
        	array("nombre" => 'Asesor educativo.', "no_rol" => 3 ),
        	array("nombre" => 'Aplicador de examenes.', "no_rol" => 5),
        	array("nombre" => 'Orientador educativo.', "no_rol" => 13 ),
        	array("nombre" => 'Promotor de la plaza comunitaria.', "no_rol" => 21),
        	array("nombre" => 'Apoyo técnico de la plaza c.', "no_rol" => 22),
        	array("nombre" => 'Personal en c.z.', "no_rol" => 41),
        	array("nombre" => 'Org. de servicio educativos.', "no_rol" => 48),
        	array("nombre" => 'Enlace regional en c.z.', "no_rol" => 61),
        	array("nombre" => 'Enlace de acreditación en c.z.', "no_rol" => 62),
        	array("nombre" => 'Apoyo de acreditación en c.z.', "no_rol" => 64),
        	array("nombre" => 'Apoyo informatico en c.z.', "no_rol" => 65),
        	array("nombre" => 'Formador especializado', "no_rol" => 67),
        	array("nombre" => 'Incorporador', "no_rol" => 70),
        	array("nombre" => 'Enlace regional de apoyo a la calidad de c.z.', "no_rol" => 78),
        	array("nombre" => 'Enlace regional de registro de plaza', "no_rol" => 80),
        	array("nombre" => 'Asesor especializado en alfabetización', "no_rol" => 88),
        	array("nombre" => 'Enlace regional de vinculación', "no_rol" => 97),
        ];

        for($i = 0; $i < count($rol); $i++) {
	        DB::table("roles")
	        ->insert($rol[$i]);
    	}

    }
}
