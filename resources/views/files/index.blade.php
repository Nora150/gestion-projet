@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestion des fichiers</h1>

        <a href="{{ route('files.create') }}" class="btn btn-primary mb-3">Téléverser un fichier</a>

        @if($files->isEmpty())
            <p>Aucun fichier disponible.</p>
        @else
            <ul class="list-group">
                @foreach($files as $file)
                    <li class="list-group-item">
                        <a href="{{ route('files.show', $file->id) }}">{{ $file->name }}</a>
                        <small class="text-muted">{{ $file->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
