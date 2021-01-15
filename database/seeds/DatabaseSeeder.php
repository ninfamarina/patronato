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
    }
}
