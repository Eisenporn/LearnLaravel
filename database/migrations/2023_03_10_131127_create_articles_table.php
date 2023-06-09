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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 80);
            $table->text('content');
            $table->string('image_path', 255)->nullable()->default('public/images/article-default.png');
            $table->integer('view_count')->default(0);
            $table->boolean('is_published')->default(false);
            $table->foreignId('author_id')->constrained('users', 'id')->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
