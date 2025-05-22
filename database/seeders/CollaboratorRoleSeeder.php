<?php

namespace Database\Seeders;

use App\Models\CollaboratorRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaboratorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollaboratorRole::create([
            'name' => 'Colaborador'
        ]);
        CollaboratorRole::create([
            'name' => 'Aprendiz'
        ]);
        CollaboratorRole::create([
            'name' => 'Freelancer'
        ]);
    }
}
