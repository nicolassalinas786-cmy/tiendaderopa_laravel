<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        Role::firstOrCreate(['id' => 1], ['nombre' => 'admin']);
        Role::firstOrCreate(['id' => 2], ['nombre' => 'cliente']);

        // Usuario admin por defecto
        Usuario::firstOrCreate(
            ['email' => 'admin@salinasoriginal.com'],
            [
                'nombre'   => 'Administrador',
                'password' => Hash::make('Admin2026*'),
                'rol_id'   => 1,
                'activo'   => true,
            ]
        );

        // Usuario cliente de prueba
        Usuario::firstOrCreate(
            ['email' => 'maicol@salinasoriginal.com'],
            [
                'nombre'   => 'maicol becerra',
                'password' => Hash::make('Cliente2026*'),
                'rol_id'   => 2,
                'activo'   => true,
            ]
        );
    }
}
