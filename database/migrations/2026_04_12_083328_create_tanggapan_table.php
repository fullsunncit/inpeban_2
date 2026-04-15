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
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();

            // 🔹 Relasi ke pengaduan
            $table->foreignId('pengaduan_id')->constrained('pengaduan')->onDelete('cascade');

            // 🔹 Relasi ke petugas
            $table->foreignId('petugas_id')->constrained('petugas')->onDelete('cascade');

            $table->text('isi_tanggapan');

            $table->dateTime('tanggal_tanggapan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapan');
    }
};
