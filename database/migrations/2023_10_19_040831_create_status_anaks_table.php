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
        Schema::create('status_anaks', function (Blueprint $table) {
            $table->id('id_status_anaks');
            $table->foreignId('anak_id')->references('id_anaks')->on('anaks')->onDelete('cascade');
            $table->boolean('status_binaan');
            $table->string('status_beasiswa');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_anaks');
    }
};
