@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Tâches</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une tâche</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if($task->status !== 'terminée')
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success">✔ Terminer</button>
                                </form>
                            @else
                                <span class="badge bg-success">Terminée</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
