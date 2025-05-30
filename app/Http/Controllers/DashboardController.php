<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();
    $projects = $user->projects;
    $tasks = $user->projects->flatMap->tasks;

    return view('dashboard', [
        'projects' => $projects,
        'totalTasks' => $tasks->count(),
        'inProgressTasks' => $tasks->where('status', 'en cours')->count(),
        'completedTasks' => $tasks->where('status', 'terminé')->count(),
    ]);
}

}

