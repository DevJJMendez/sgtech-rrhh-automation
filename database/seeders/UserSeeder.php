<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Luisa Fernanda',
            'email' => 'luisa@gmail.com',
            'password' => Hash::make('A2-QL|f1i@2|'),
        ])->assignRole('rrhh');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(')_8tBY8ss16£'),
        ])->assignRole('admin');
    }
}
