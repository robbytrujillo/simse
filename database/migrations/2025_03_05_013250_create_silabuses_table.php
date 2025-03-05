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
        Schema::create('silabuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculum_id');
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('class_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('curriculum_id')->references('id')->on('kurikulums')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_rooms')->onUpdate('restrict')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silabuses');
    }
};
