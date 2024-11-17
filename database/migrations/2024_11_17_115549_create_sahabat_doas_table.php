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
        Schema::create('sahabat_doas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('no_hp');
            $table->string('pokok_doa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sahabat_doas');
    }
};
