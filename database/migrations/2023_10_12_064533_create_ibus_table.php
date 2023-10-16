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
        Schema::create('ibus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('pendapatan_ibu');
            $table->string('agama');
            $table->string('alamat');
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
        Schema::dropIfExists('ibus');
    }
};
