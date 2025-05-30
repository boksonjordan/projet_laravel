@extends('layout.app')

@section('title', 'Liste des projets')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mes projets</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un projet</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($projects->isEmpty())
    <div class="alert alert-info">Aucun projet trouvé.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->deadline }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Détails</a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
