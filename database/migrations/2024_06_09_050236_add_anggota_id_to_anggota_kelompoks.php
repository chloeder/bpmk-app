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
    Schema::table('anggota_kelompoks', function (Blueprint $table) {
      $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('anggota_kelompoks', function (Blueprint $table) {
      $table->dropColumn('anggota_id');
    });
  }
};
