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
            $table->id();
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('no_ktp_wali');
            $table->string('nama_lengkap_wali');
            $table->string('nama_panggilan_wali');
            $table->string('tempat_lahir_wali');
            $table->date('tanggal_lahir_wali');
            $table->string('pekerjaan_wali');
            $table->string('jumlah_tanggungan_wali');
            $table->string('pendapatan_wali');
            $table->timestamps();

            // Menambahkan kunci asing (foreign key) ke tabel 'data_keluargas'
            // $table->foreignId('data_keluargas_id')->references('id')->on('data_keluargas')->unique();
            // $table->unsignedBigInteger('data_keluargas_id');
            // $table->foreign('data_keluargas_id')->references('id')->on('data_keluargas')->onDelete('cascade');

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
