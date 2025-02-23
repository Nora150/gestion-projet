import './bootstrap';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Écoute les tâches assignées en temps réel
window.Echo.channel('tasks')
    .listen('TaskAssignedEvent', (data) => {
        alert('Nouvelle tâche assignée : ' + data.task.title);
    });