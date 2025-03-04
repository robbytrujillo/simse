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
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('score');
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams')->onUpdate('restrict')->onDelete('cascade');
        $table->foreign('student_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
