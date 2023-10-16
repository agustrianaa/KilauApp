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
            $table->id('id_calon_anak_binaans');
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('nama_lengkap_calon_anak');
            $table->string('nama_panggilan_calon_anak');
            $table->string('tempat_lahir_calon_anak');
            $table->string('tanggal_lahir_calon_anak');
            $table->string('anak_ke');
            $table->string('nama_sekolah');
            $table->string('kelas_sekolah');
            $table->string('nama_madrasah');
            $table->string('kelas_madrasah');
            $table->string('hobby');
            $table->string('cita_cita');
            $table->string('status_binaan');
            $table->string('status_validasi');
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
        Schema::dropIfExists('calon_anak_binaans');
    }
};
