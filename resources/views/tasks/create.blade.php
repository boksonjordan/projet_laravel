@extends('layout.app')

@section('content')
<div class="container">
    <h1>Créer une tâche</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $projectId }}">

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="not started">Non commencée</option>
                <option value="in progress">En cours</option>
                <option value="completed">Terminée</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Date limite</label>
            <input type="date" name="deadline" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection