<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'ing69chipmunks@hotmail.com'],
            [
                'name' => 'Administrador1',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'ing69chipmunks@gmail.com'],
            [
                'name' => 'Docente Prueba',
                'password' => Hash::make('docente'),
                'role' => 'docente',
            ]
        );
    }
}
