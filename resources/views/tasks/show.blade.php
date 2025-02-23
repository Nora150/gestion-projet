@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>
        <p><strong>Début :</strong> {{ $task->start_date }}</p>
        <p><strong>Fin :</strong> {{ $task->end_date }}</p>
        <p><strong>Statut :</strong> <span class="badge bg-info">{{ $task->status }}</span></p>
        <p><strong>Assignée à :</strong> {{ $task->assignedUser->name ?? 'Non assignée' }}</p>

        <!-- Bouton "Marquer comme terminée" -->
        @if($task->status !== 'terminée')
            <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">✔ Marquer comme terminée</button>
            </form>
        @endif

        <!-- Bouton retour -->
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Retour</a>
    </div>
@endsection
