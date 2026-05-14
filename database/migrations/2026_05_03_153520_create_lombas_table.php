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
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('penyelenggara');
            $table->string('kategori'); // e.g. Sains, Teknologi, Bisnis, Seni, Olahraga
            $table->enum('tingkat', ['nasional', 'internasional', 'regional']);
            $table->date('deadline');
            $table->text('hadiah')->nullable();
            $table->text('syarat_peserta')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link_resmi');
            $table->string('poster')->nullable();
            $table->enum('status', ['buka', 'tutup', 'selesai'])->default('buka');
            $table->foreignId('id_admin')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba');
    }
};
