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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id')->nullable();
            $table->string('status_binaan')->nullable();
            $table->timestamps();

            $table->foreign('anak_id')->references('id_anaks')->on('anaks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
