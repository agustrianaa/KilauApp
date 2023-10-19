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
        Schema::create('anaks', function (Blueprint $table) {
            $table->id('id_anaks');
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama_sekolah');
            $table->string('kelas_sekolah');
            $table->string('nama_madrasah');
            $table->string('kelas_madrasah');
            $table->string('hobby');
            $table->string('cita_cita');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
