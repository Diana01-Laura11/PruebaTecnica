<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'idRol' => 2,
            'nombre' => 'Iveth',
            'correo' => 'iveth@gmail.com',
            'contrasena' => Hash::make('contraseña123'),
            'estatus' => 1
        ]);
        
    }
}