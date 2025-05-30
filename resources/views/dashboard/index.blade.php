@extends('layouts.appdashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <!-- Card Projets -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Projets</h5>
                    <p>Total : {{ $totalProjects }}</p>
                    <p>En cours : {{ $inProgressProjects }}</p>
                    <p>Terminés : {{ $completedProjects }}</p>
                </div>
            </div>
        </div>

        <!-- Card Tâches -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Tâches</h5>
                    <p>Total : {{ $totalTasks }}</p>
                    <p>Non commencées : {{ $notStartedTasks }}</p>
                    <p>En cours : {{ $inProgressTasks }}</p>
                    <p>Terminées : {{ $completedTasks }}</p>
                </div>
            </div>
        </div>

        <!-- Card Informations -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body">
                    <h5>Informations</h5>
                    <p>Bienvenue sur votre tableau de bord.</p>
                    <p>Ici, vous pouvez gérer vos projets et tâches.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
