<?php


namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Jobs\TaskReminderJob;
use App\Models\Task;
use Illuminate\Console\Scheduling\Schedule;

use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\Authenticate;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */


    /**
     * The application's route middleware groups.
     */


    /**
     * The application's route middleware.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Ajoute ton middleware ici
    ];

    protected function schedule(Schedule $schedule)
    {
        // Récupère les tâches avec une date d’échéance pour aujourd'hui
        $schedule->call(function () {
            $tasks = Task::whereDate('due_date', now()->toDateString())->get();
    
            foreach ($tasks as $task) {
                dispatch(new TaskReminderJob($task));
            }
        })->dailyAt('08:00'); // Exécute chaque jour à 08h00
    }
}
