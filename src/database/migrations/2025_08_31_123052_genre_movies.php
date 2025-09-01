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
        Schema::create('genre_movies', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('genre_id')->constrained('genres')->cascadeOnDelete();
            $table->foreignUuid('movie_id')->constrained('movies')->cascadeOnDelete();
            $table->unique(['genre_id', 'movie_id']);
            $table->index('movie_id');
            $table->index('genre_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_movie');
    }
};
