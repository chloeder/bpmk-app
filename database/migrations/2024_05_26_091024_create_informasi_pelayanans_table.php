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
    Schema::create('informasi_pelayanans', function (Blueprint $table) {
      $table->id();
      $table->string('judul');
      $table->string('jenis_pelayanan');
      $table->string('deskripsi');
      $table->string('tempat_pelayanan');
      $table->string('nomor_telepon');
      $table->string('tanggal_pelayanan');
      $table->string('image');
      $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('informasi_pelayanans');
  }
};
