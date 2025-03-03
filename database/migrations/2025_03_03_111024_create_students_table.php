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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('name');
            $table->string('email');
            $table->enum('gender', ['L', 'P']);
            $table->date('dob');
            $table->text('address');
            $table->string('phone');
            $table->foreignId('class_id')->constrained('class_rooms')->onDelete('cascade');
            $table->string('father_name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
