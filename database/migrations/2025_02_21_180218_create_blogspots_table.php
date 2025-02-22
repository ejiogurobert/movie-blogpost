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
        Schema::create('blogspots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('content');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->date('published_at');
            $table->date('edited_at');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogspots');
    }
};
