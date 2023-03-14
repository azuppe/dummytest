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
        Schema::disableForeignKeyConstraints();

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->string('status', 50);
            $table->date('published_on')->nullable();
            $table->foreignId('published_by')->constrained('users', 'by');
            $table->foreignId('cover_image_id')->constrained('medias');
            $table->foreignId('created_by')->constrained('users', 'by');
            $table->boolean('featured');
            $table->text('content');
            $table->string('link', 200);
            $table->string('tint', 20);
            $table->json('soe');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
