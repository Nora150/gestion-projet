<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskAssignedEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $task;

    /**
     * Crée un nouvel événement d'assignation de tâche.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Détermine le canal de diffusion.
     */
    public function broadcastOn()
    {
        return new Channel('tasks');
    }

    /**
     * Détermine le nom de l'événement diffusé.
     */
    public function broadcastAs()
    {
        return 'TaskAssignedEvent';
    }
}
