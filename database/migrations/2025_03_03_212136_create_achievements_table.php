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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('achievement_type_id');
            $table->date('date');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('achievement_reward_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('image')->nullable();
            
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('achievement_type_id')->references('id')->on('achievement_types')->onDelete('cascade');
            $table->foreign('achievement_reward_id')->references('id')->on('achievement_awards')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
