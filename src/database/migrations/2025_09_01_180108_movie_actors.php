<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_actors', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('movie_id')->constrained('movies')->cascadeOnDelete();
            $table->foreignUuid('actor_id')->constrained('actors')->cascadeOnDelete();
            $table->unique(['movie_id', 'actor_id']);
            $table->index('movie_id');
            $table->index('actor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_actors');
    }
};
