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
        Schema::create('pengurus_harian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('struktur_organisasi_id')->constrained('struktur_organisasi')->onDelete('cascade');
            $table->string('nama');
            $table->enum('jabatan', ['Ketua', 'Sekretaris', 'Bendahara']);
            $table->string('foto')->nullable();
            $table->enum('status', ['published', 'nonaktif'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_harian');
    }
};
