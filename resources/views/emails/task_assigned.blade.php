<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle tâche assignée</title>
</head>
<body>
    <h2>Bonjour,</h2>
    <p>Une nouvelle tâche vous a été assignée.</p>
    <p><strong>Titre :</strong> {{ $task->title }}</p>
    <p><strong>Description :</strong> {{ $task->description }}</p>
    <p><strong>Date limite :</strong> {{ $task->due_date }}</p>
    <p>Vous pouvez consulter votre tâche ici : <a href="{{ route('tasks.show', $task->id) }}">Voir la tâche</a></p>
</body>
</html>
