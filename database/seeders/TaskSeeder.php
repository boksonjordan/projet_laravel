<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();
        $users = User::all();

        foreach ($projects as $project) {
            for ($i = 1; $i <= 3; $i++) {
                Task::create([
                    'project_id' => $project->id,
                    'title' => "Tâche $i du projet {$project->title}",
                    'description' => "Description de la tâche $i",
                    'status' => 'en attente',
                    'priority' => 'moyenne',
                    'assigned_to' => $users->random()->id,
                ]);
            }
        }
    }
}
