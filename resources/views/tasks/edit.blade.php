@extends('layout.app')

@section('content')
<div class="container">
    <h1>Modifier la tâche</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="en attente" {{ $task->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminée" {{ $task->status == 'terminée' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Date limite</label>
            <input type="date" name="deadline" value="{{ $task->deadline ? $task->deadline->format('Y-m-d') : '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="project_id">Projet</label>
            <select name="project_id" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
