<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskAssignedEvent;
use App\Models\Task;
use App\Models\Project;
use App\Mail\TaskAssigned;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::with('users')->get(); // Charge les projets avec leurs utilisateurs
        return view('tasks.create', compact('projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:en cours,terminée,suspendue',
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'assigned_to' => $request->assigned_to,
            'project_id' => $request->project_id,
        ]);

        if ($task->assigned_to) {
            event(new TaskAssignedEvent($task));
        }
    
        return redirect()->route('tasks.index')->with('success', 'Tâche créée et assignée avec succès.');

        if ($task->assigned_to) {
            Mail::to($task->assignedUser->email)->send(new TaskAssigned($task));
        }

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }


    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::with('users')->get(); // Charge aussi les projets avec utilisateurs
        return view('tasks.edit', compact('task', 'projects'));
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:en cours,terminée,suspendue',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }

    public function markAsCompleted(Task $task)
    {
        $task->update(['status' => 'terminée']);

        return redirect()->back()->with('success', 'Tâche marquée comme terminée.');
    }
}
