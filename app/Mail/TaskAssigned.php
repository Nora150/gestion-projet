<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Crée une nouvelle instance du Mailable.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Construire le message.
     */
    public function build()
    {
        return $this->subject('Nouvelle tâche assignée : ' . $this->task->title)
                    ->view('emails.task_assigned');
    }
}
