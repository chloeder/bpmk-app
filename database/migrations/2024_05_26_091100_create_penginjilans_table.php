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
    Schema::create('penginjilans', function (Blueprint $table) {
      $table->id();
      $table->string('nama_penginjil');
      $table->string('nama_diinjili');
      $table->string('bahan');
      $table->string('jumlah_diinjili');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('penginjilans');
  }
};
