<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Project::create([
                'user_id' => $user->id,
                'title' => 'Projet de ' . $user->name,
                'description' => 'Ce projet a été créé automatiquement pour ' . $user->name,
                'deadline' => now()->addDays(15),
                'status' => 'en cours',
            ]);
        }
    }
}
