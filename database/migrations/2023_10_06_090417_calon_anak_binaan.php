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
            $table->string('name');
            $table->string('anak_ke');
            $table->string('status_binaan');
            $table->string('status_validasi');
            $table->timestamps();

            // Menambahkan kunci asing (foreign key) ke tabel 'data_keluargas'
            $table->unsignedBigInteger('data_keluargas_id');
            $table->foreign('data_keluargas_id')->references('id')->on('data_keluargas')->onDelete('cascade');
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
