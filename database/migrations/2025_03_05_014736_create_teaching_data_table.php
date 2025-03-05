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
        Schema::create('teaching_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('hours_per_week');
            $table->longText('day')->collation('utf8mb4_bin')->nullable();
            $table->longText('start_time')->collation('utf8mb4_bin')->nullable();
            $table->longText('end_time')->collation('utf8mb4_bin')->nullable();
            $table->timestamps();
    
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_rooms')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_data');
    }
};
