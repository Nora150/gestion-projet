<?php

namespace App\Jobs;

use App\Mail\TaskReminder;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class TaskReminderJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function handle()
    {
        if ($this->task->status !== 'terminée') {
            Mail::to($this->task->assignedUser->email)->send(new TaskReminder($this->task));
        }
    }
}
