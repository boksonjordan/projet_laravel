<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    

    // Liste des projets de l'utilisateur connecté
    public function index()
    {
        $projects = Auth::user()->projects()->get();
        return view('projects.index', compact('projects'));
    }

    // Formulaire de création d’un projet
    public function create()
    {
        return view('projects.create');
    }

    // Enregistrement d’un nouveau projet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        Auth::user()->projects()->create($validated);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès');
    }

    // Afficher un projet
    public function show(Project $project)
    {
        // Vérifie que le projet appartient à l'utilisateur
        return view('projects.show', compact('project'));
    }

    // Formulaire d’édition
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Mise à jour
    public function update(Request $request, Project $project)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'status' => 'required|in:en cours,terminé',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour');
    }

    // Suppression
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé');
    }
}
