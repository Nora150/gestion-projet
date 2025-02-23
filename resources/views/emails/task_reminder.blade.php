<!DOCTYPE html>
<html>
<head>
    <title>Rappel de tâche</title>
</head>
<body>
    <h2>Bonjour,</h2>
    <p>Votre tâche <strong>{{ $task->title }}</strong> arrive à échéance !</p>
    <p>Date limite : {{ $task->due_date }}</p>
    <p>Veuillez la terminer dès que possible.</p>
</body>
</html>
