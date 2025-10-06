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
        Schema::create('score_conversions', function (Blueprint $table) {
            $table->id();
            $table->enum('section', ['listening', 'structure', 'reading']);
            $table->unsignedTinyInteger('correct_answers');
            $table->unsignedTinyInteger('converted_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_conversions');
    }
};
