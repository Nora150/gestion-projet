@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <!-- Projets -->
            <div class="col">
                <div class="stats-card border border-gray-200 shadow-sm rounded-lg p-4 text-center bg-white" style="border-radius: 20px;">
                    <div class="stats-info">
                        <span class="text-gray-500 text-xs font-medium">📁 Projets</span>
                        <h3 class="text-gray-900 text-lg font-bold">0</h3>
                        <a href="{{ route('projects.index') }}" class="text-blue-500 text-sm font-medium">Voir plus →</a>
                    </div>
                </div>
            </div>

            <!-- Tâches -->
            <div class="col">
                <div class="stats-card border border-gray-200 shadow-sm rounded-lg p-4 text-center bg-white" style="border-radius: 20px;">
                    <div class="stats-info">
                        <span class="text-gray-500 text-xs font-medium">✅ Tâches</span>
                        <h3 class="text-gray-900 text-lg font-bold">4</h3>
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 text-sm font-medium">Voir plus →</a>
                    </div>
                </div>
            </div>

            <!-- Utilisateurs & Rôles -->
            <div class="col">
                <div class="stats-card border border-gray-200 shadow-sm rounded-lg p-4 text-center bg-white" style="border-radius: 20px;">
                    <div class="stats-info">
                        <span class="text-gray-500 text-xs font-medium">👥 Utilisateurs & Rôles</span>
                        <h3 class="text-gray-900 text-lg font-bold">1</h3>
                        <a href="{{ route('users.index') }}" class="text-blue-500 text-sm font-medium">Voir plus →</a>
                    </div>
                </div>
            </div>

            <!-- Fichiers -->
            <div class="col">
                <div class="stats-card border border-gray-200 shadow-sm rounded-lg p-4 text-center bg-white" style="border-radius: 20px;">
                    <div class="stats-info">
                        <span class="text-gray-500 text-xs font-medium">📂 Fichiers</span>
                        <h3 class="text-gray-900 text-lg font-bold">1</h3>
                        <a href="{{ route('files.index') }}" class="text-blue-500 text-sm font-medium">Voir plus →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
