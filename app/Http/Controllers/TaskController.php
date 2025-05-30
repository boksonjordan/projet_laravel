<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks; // Accéder aux tâches associées au projet
        return view('tasks.index', compact('tasks', 'project')); 
    }

    public function create(Project $project)
    {
        return view('tasks.create', ['project' => $project]);
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|string|in:en attente,en cours,terminée',
            'deadline' => 'nullable|date',
            'project_id' => 'required|exists:projects,id',
        ]);

        $userId = Auth::id();

        if (!$userId) {
            return redirect()->back()->withErrors(['user' => 'Vous devez être connecté pour créer une tâche.']);
        }

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->project_id = $request->project_id;
        $task->user_id = $userId;

        $task->save();

        return redirect()->route('tasks.index', $request->project_id)
                         ->with('success', 'Tâche créée avec succès.');
    }

    public function edit(Task $task)
    {
        $projects = Project::all(); // Pour permettre à l’utilisateur de changer de projet
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:en attente,en cours,terminée',
            'deadline' => 'nullable|date',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index', $task->project_id)
                         ->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index', $task->project_id)
                         ->with('success', 'Tâche supprimée avec succès.');
    }

    public function assign($taskId)
    {
        $task = Task::findOrFail($taskId);
        $users = User::all();
        return view('tasks.assign', compact('task', 'users'));
    }
}
