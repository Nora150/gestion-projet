<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->morphs('notifiable'); // Permet d'attacher une notification à différents modèles (User, Admin, etc.)
            $table->text('data'); // Stocke les données de la notification
            $table->timestamp('read_at')->nullable(); // Date de lecture
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
