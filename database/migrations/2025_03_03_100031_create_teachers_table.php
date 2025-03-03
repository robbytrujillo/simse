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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);
            $table->text('address');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('last_education');
            $table->string('education_institution');
            $table->year('graduation_year');
            $table->string('employee_id');
            $table->enum('employment_status',['PTY', 'Kontrak', 'Pengabdian']);
            $table->string('position');
            $table->date('start_date');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
