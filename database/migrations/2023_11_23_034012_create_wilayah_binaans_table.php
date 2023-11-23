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
        Schema::create('wilayah_binaans', function (Blueprint $table) {
            $table->id('id_wilbin');
            $table->foreignId('kacab_id')->references('id_kacab')->on('kantor_cabangs')->onDelete('cascade');
            $table->string('nama_wilbin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_binaans');
    }
};
