@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un Projet</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre du projet</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Date de fin</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <!-- Sélecteur de statut -->
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select name="status" class="form-select">
                    <option value="en cours" {{ old('status') == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminé" {{ old('status') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                    <option value="en attente" {{ old('status') == 'en attente' ? 'selected' : '' }}>En attente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
