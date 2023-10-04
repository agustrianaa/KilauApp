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
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id')->references('id')->on('keluargas')->unique();
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->string('agama_ayah');
            $table->string('status_ayah');
            $table->string('penghasilan_ayah');
            $table->string('alamat_ayah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayahs');
    }
};
