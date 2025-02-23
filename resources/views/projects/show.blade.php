@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p><strong>Début :</strong> {{ $project->start_date }}</p>
        <p><strong>Fin :</strong> {{ $project->end_date }}</p>

        <!-- Bouton Retour -->
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Retour</a>

        <!-- Formulaire d'invitation -->
        <div class="mt-4 p-4 border rounded bg-white shadow-sm">
            <h4>Inviter un utilisateur</h4>
            <form action="{{ route('projects.invite', ['id' => $project->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email de l'utilisateur</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select name="role" class="form-select">
                        <option value="membre">Membre</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Inviter</button>
            </form>
        </div>

        <!-- Affichage du statut du projet -->
        <p class="mt-3"><strong>Statut :</strong> <span class="badge bg-info">{{ $project->status }}</span></p>
    </div> 
@endsection
