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
    Schema::create('anggotas', function (Blueprint $table) {
      $table->id();
      $table->string('nama_anggota');
      $table->string('jenis_kelamin');
      $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade')->onUpdate('cascade');
      $table->string('angkatan');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('anggotas');
  }
};
