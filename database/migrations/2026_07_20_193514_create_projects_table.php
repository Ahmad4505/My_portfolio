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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description');
            $table->longText('description');

            $table->string('thumbnail')->nullable();
            $table->string('cover_image')->nullable();

            $table->string('github')->nullable();
            $table->string('live_demo')->nullable();

            $table->string('client')->nullable();

            $table->date('project_date')->nullable();

            $table->boolean('featured')->default(false);

            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
