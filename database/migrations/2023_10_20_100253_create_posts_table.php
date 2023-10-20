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
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title', 33);
            $table->string('text');

            $table->boolean('trainee');

            $table->foreignId('profession_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->string('year');

            $table->boolean('remote')->nullable();

            $table->string('duration');

            $table->string('company');

            $table->foreignId('county_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
