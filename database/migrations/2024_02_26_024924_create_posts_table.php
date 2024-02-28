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
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->from(1000); // Start auto increment from 1000
            $table->foreignId('user_id')
                ->comment('Author of the post')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('excerpt')
                ->comment('Short description of the post');
            $table->longText('description');
            $table->boolean('is_published')->default(false); // Post is not published by default
            $table->integer('min_to_read')->nullable(false); // Estimated time to read the post
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
