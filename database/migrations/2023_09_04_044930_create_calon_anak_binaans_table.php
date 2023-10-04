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
        Schema::create('calon_anak_binaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('shelter');
            $table->string('no_kk');
            // $table->string('kepala_keluarga');
            // $table->integer('anak_ke');
            // $table->string('status_binaan');
            // $table->string('status_validasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_anak_binaans');
    }
};
