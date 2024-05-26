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
    Schema::create('kelompok_kecils', function (Blueprint $table) {
      $table->id();
      $table->string('nama_kelompok');
      $table->string('status_kelompok');
      $table->foreignId('unit_pelayanan_id')->constrained('unit_pelayanans')->onDelete('cascade')->onUpdate('cascade');
      $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('kelompok_kecils');
  }
};
