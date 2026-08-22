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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan')->onDelete('cascade');
            $table->string('bulan', 50);
            $table->year('tahun');
            $table->decimal('gaji_pokok', 12,2)->nullable();
            $table->decimal('tunjangan', 12,2)->nullable();
            $table->decimal('lembur', 12,2)->nullable();
            $table->decimal('total_gaji', 12,2)->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
