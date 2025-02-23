@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le projet</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $project->start_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Date de fin</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $project->end_date) }}" required>
            </div>

            <!-- Sélecteur de statut -->
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select name="status" class="form-select">
                    <option value="en cours" {{ old('status', $project->status ?? '') == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminé" {{ old('status', $project->status ?? '') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                    <option value="en attente" {{ old('status', $project->status ?? '') == 'en attente' ? 'selected' : '' }}>En attente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
