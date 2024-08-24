<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'master',
            'email' => 'maggotgluon@gmail.com',
            'password' => Hash::make('gto3000gt')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@clubneeladykhumquiz.com',
            'password' => Hash::make('clubneeladykhumquiz')
        ]);
    }
}
