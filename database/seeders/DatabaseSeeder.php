<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\roles;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        roles::create([
            'rol' => 'Admin'
        ]);
        roles::create([
            'rol' => 'Operador'
        ]);
        roles::create([
            'rol' => 'User'
        ]);

        User::create([
            'name' => 'Administrador',
            'usuario' => 'Administrador',
            'email' => 'administrador@administrador.com',
            'password' => bcrypt('administrador'),
            'rol' => 1,
            'estado' => 1
        ]);

        User::create([
            'name' => 'usuario',
            'usuario' => 'Usuario',
            'email' => 'usuario@usuario.com',
            'password' => bcrypt('usuario'),
            'rol' => 2,
            'estado' => 1
        ]);
    }
}
