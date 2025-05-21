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
            'name' => 'Collaborador'
        ]);
        CollaboratorRole::create([
            'name' => 'aprendiz'
        ]);
        CollaboratorRole::create([
            'name' => 'freelancer'
        ]);
    }
}
