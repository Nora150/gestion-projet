@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la tâche</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titre de la tâche</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Date d'échéance</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}" required>
            </div>

            <!-- Sélecteur de statut -->
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select id="status" name="status" class="form-select">
                    <option value="en cours" {{ old('status', $task->status ?? '') == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminée" {{ old('status', $task->status ?? '') == 'terminée' ? 'selected' : '' }}>Terminée</option>
                    <option value="suspendue" {{ old('status', $task->status ?? '') == 'suspendue' ? 'selected' : '' }}>Suspendue</option>
                </select>
            </div>

            <!-- Sélecteur d'assignation corrigé -->
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assigner à</label>
                <select id="assigned_to" name="assigned_to" class="form-select">
                    <option value="">-- Sélectionner un membre --</option>
                    @foreach($projects as $project) <!-- On boucle sur les projets -->
                        @foreach($project->users as $user) <!-- On récupère les utilisateurs du projet -->
                            <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $project->title }})
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
