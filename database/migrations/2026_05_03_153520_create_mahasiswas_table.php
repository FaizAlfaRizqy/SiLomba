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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nim')->unique();
            $table->string('program_studi');
            $table->string('domisili');
            $table->json('keahlian')->nullable();
            $table->json('minat_lomba')->nullable();
            $table->string('link_portofolio')->nullable();
            $table->enum('ketersediaan_waktu', ['Full-time', 'Part-time', 'Weekends only'])->nullable();
            $table->enum('level_privasi', ['publik', 'privat', 'tim saja'])->default('publik');
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
