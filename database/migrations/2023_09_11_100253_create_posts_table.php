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
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('title',33);
            $table->string('text');
            //----------
            //diákmunka vagy szakmai gyakorlat boolean
            $table->boolean('trainee');// 0 -> student job, 1 -> trainee
            //szakterület
            $table->string('profession');
            //mikor
            $table->string('year');
            //remote
            $table->boolean('remote')->nullable();
            //mennyi ideig
            //String vagy válaszható lista
            $table->string('duration');
            //cég
            $table->string('company');
            // //hol -> város
            // $table->string('city');
            //     // $table->foreignId('city_id')->constrained()->onUpdate('cascade')
            //     // ->onDelete('cascade');



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
