<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Patronato',
            'email' => 'bcs_patronato@hotmail.com',
            'password' => bcrypt('patbcs'),
        ]);
    }
}
