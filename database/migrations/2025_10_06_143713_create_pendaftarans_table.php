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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users dan jadwal_tes
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jadwal_tes_id')->constrained('jadwal_tes')->onDelete('cascade');
            $table->enum('status', ['TERDAFTAR', 'SELESAI'])->default('TERDAFTAR');
            // Skor akan diisi nanti, jadi buat nullable
            $table->unsignedTinyInteger('skor_listening')->nullable();
            $table->unsignedTinyInteger('skor_structure')->nullable();
            $table->unsignedTinyInteger('skor_reading')->nullable();
            $table->unsignedSmallInteger('skor_total')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
