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
        Schema::create('walis', function (Blueprint $table) {
            $table->id('id_walis');
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('no_ktp');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('jumlah_tanggungan');
            $table->string('pendapatan');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walis');
    }
};
