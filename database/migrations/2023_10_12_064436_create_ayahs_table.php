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
            $table->id('id_ayahs');
            // $table->unsignedBigInteger('data_keluargas_id');
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('jumlah_tanggungan_ayah');
            $table->string('pendapatan_ayah');
            $table->string('agama');
            $table->string('alamat');
            $table->timestamps();

            // Menambahkan kunci asing (foreign key) ke tabel 'data_keluargas'
            // $table->foreignId('data_keluargas_id')->constrained('data_keluargas')->unique();
            // $table->foreign('data_keluargas_id')->constraint('id')->on('data_keluargas')->onDelete('cascade');

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
