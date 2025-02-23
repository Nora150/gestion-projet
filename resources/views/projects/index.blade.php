@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des projets</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un projet</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce projet ?');">
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
