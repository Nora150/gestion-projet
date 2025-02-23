@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Créer un utilisateur</a>

        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} - {{ $user->email }}</li>
            @endforeach
        </ul>
    </div>
@endsection
