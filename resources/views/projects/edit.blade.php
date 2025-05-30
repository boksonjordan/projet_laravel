@extends('layout.app')

@section('title', 'Modifier le projet')

@section('content')
<h2>Modifier le projet : {{ $project->title }}</h2>

<form action="{{ route('projects.update', $project) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $project->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input type="date" name="deadline" class="form-control" value="{{ $project->deadline }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Statut</label>
        <select name="status" class="form-select">
            <option value="en cours" @selected($project->status === 'en cours')>En cours</option>
            <option value="terminé" @selected($project->status === 'terminé')>Terminé</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
@endsection
