@extends('layout.app')

@section('title', 'Créer un projet')

@section('content')
<h2>Créer un nouveau projet</h2>

<form action="{{ route('projects.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input type="date" name="deadline" class="form-control">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Statut</label>
        <select name="status" class="form-select">
            <option value="en cours">En cours</option>
            <option value="terminé">Terminé</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Créer</button>
</form>
@endsection
