@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Assigner une Tâche</h1>
    <form action="{{ route('tasks.assign', $task->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select class="form-select" id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assigner</button>
    </form>
</div>
@endsection
