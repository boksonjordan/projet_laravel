@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tableau de bord</h1>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Projets</h5>
                    <p class="card-text fs-1">{{ $projects->count() ?? 0 }}</p>
                    <p class="card-text">Total de projets</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Tâches en cours</h5>
                    <p class="card-text fs-1">{{ $tasksInProgressCount ?? 0 }}</p>
                    <p class="card-text">Tâches en cours</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Tâches terminées</h5>
                    <p class="card-text fs-1">{{ $tasksDoneCount ?? 0 }}</p>
                    <p class="card-text">Tâches complétées</p>
                </div>
            </div>
        </div>
    </div>
@endsection
