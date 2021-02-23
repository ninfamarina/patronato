<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MunicipioSeeder::class);
         $this->call(CiudadSeeder::class);
         $this->call(CoordinacionZonaSeeder::class);
         $this->call(RegistroCivilSeeder::class);
         $this->call(SeguroMedicoSeeder::class);
         $this->call(RolSeeder::class);
         $this->call(EscolaridadSeeder::class);
         
    }
}
