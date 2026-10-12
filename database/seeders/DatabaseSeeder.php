<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Gustavo Pagliaro',
            'email' => 'gustavopagliaro@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Adolfo Rodriguez',
            'email' => 'adolfo@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Laura Sanabria',
            'email' => 'laura@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        Categoria::create(['nombre' => 'Alimentación', 'tipo' => 'gasto']);
        Categoria::create(['nombre' => 'Transporte', 'tipo' => 'gasto']);
        Categoria::create(['nombre' => 'Salud', 'tipo' => 'gasto']);
        Categoria::create(['nombre' => 'Entretenimientos', 'tipo' => 'gasto']);
        Categoria::create(['nombre' => 'Sueldos', 'tipo' => 'ingreso']);
        Categoria::create(['nombre' => 'Inversiones', 'tipo' => 'ingreso']);
        Categoria::create(['nombre' => 'Ahorros', 'tipo' => 'gasto']);
        Categoria::create(['nombre' => 'Otros Ingresos', 'tipo' => 'ingreso']);
        Categoria::create(['nombre' => 'Otros Gastos', 'tipo' => 'gasto']);
    }
}
