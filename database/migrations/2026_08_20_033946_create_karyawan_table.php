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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->unique()->constrained('users')->nullOnDelete();
            $table->foreignId('id_jabatan')->constrained('jabatan')->onDelete('cascade');
            $table->string('nip');
            $table->string('nama_lengkap', 255);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('bank', 100);
            $table->string('nomer_rekening', 100);
            $table->date('tanggal_masuk');
            $table->string('no_telp');
            $table->text('alamat');
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
