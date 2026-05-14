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
        Schema::create('slot_tim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tim')->constrained('tim')->onDelete('cascade');
            $table->string('posisi');
            $table->json('keahlian_dibutuhkan')->nullable();
            $table->integer('jumlah_slot')->default(1);
            $table->text('deskripsi')->nullable();
            $table->date('batas_waktu');
            $table->enum('status', ['buka', 'tutup'])->default('buka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot_tim');
    }
};
