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
    Schema::create('anggota_kelompoks', function (Blueprint $table) {
      $table->id();
      $table->string('nama_anggota');
      $table->string('jenis_kelamin');
      $table->string('jurusan');
      $table->string('bahan')->nullable();
      $table->string('kategori')->nullable();
      $table->string('kondisi')->nullable();
      $table->foreignId('kelompok_kecil_id')->constrained('kelompok_kecils')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('anggota_kelompoks');
  }
};
