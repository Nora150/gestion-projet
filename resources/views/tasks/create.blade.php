@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une Tâche</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Date d'échéance</label>
                <input type="date" id="due_date" name="due_date" class="form-control" required>
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

            <!-- Sélecteur du projet -->
            <div class="mb-3">
                <label for="project_id" class="form-label">Projet</label>
                <select id="project_id" name="project_id" class="form-select" onchange="toggleProjectInput(this)" required>
                    <option value="">-- Sélectionner un projet --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                    <option value="new">-- Ajouter un nouveau projet --</option>
                </select>
                <input type="text" id="new_project" name="new_project" class="form-control mt-2" placeholder="Entrez le nom du nouveau projet" style="display: none;">
            </div>

            <script>
                function toggleProjectInput(select) {
                    var newProjectInput = document.getElementById("new_project");
                    if (select.value === "new") {
                        newProjectInput.style.display = "block";
                        newProjectInput.setAttribute("required", "required");
                    } else {
                        newProjectInput.style.display = "none";
                        newProjectInput.removeAttribute("required");
                    }
                }
            </script>

            <!-- Sélecteur d'assignation corrigé -->
            <div class="mb-3">
                <label for="assigned_to" class="form-label">Assigner à</label>
                <select id="assigned_to" name="assigned_to" class="form-select">
                    <option value="">-- Sélectionner un membre --</option>
                    @foreach($projects as $project) <!-- Boucle sur les projets -->
                        @foreach($project->users as $user) <!-- Boucle sur les membres du projet -->
                            <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $project->title }})
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
