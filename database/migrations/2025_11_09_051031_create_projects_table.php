<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('full_description')->nullable();
            $table->json('tags'); // Store as JSON array
            $table->string('image')->nullable();
            $table->string('category');
            $table->string('client')->nullable();
            $table->string('year');
            $table->string('duration')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('github_link')->nullable();
            $table->json('challenges')->nullable(); // Store as JSON array
            $table->json('solutions')->nullable(); // Store as JSON array
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};