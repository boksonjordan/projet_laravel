@extends('layout.app')
@section('content')
    <div class="container py-5">

    <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary mb-4">← Retour à la liste des projets</a>

    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">{{ $project->title }}</h2>
            <p class="card-text text-muted">{{ $project->description }}</p>

            <div class="mb-3">
                <span class="badge bg-primary">Statut : {{ $project->status }}</span>
                @if($project->deadline)
                    <span class="badge bg-warning text-dark">Deadline : {{ \Carbon\Carbon::parse($project->deadline)->format('d/m/Y') }}</span>
                @else
                    <span class="badge bg-secondary">Pas de deadline</span>
                @endif
            </div>

            <div class="d-flex gap-2 mb-4">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary">Modifier</a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                </form>
            </div>

            <hr>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Tâches associées</h4>
                <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-sm btn-success">➕ Ajouter une tâche</a>
            </div>

            @if ($project->tasks->isEmpty())
                <p class="text-muted">Aucune tâche associée pour l’instant.</p>
            @else
                <ul class="list-group">
                    @foreach ($project->tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $task->title }}</strong>
                                <br>
                                <small class="text-muted">Statut : {{ $task->status }}</small>
                                @if($task->deadline)
                                    <br>
                                    <small class="text-muted">Deadline : {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</small>
                                @endif
                            </div>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</div>
</div>@endsection
