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
            $table->id('id_ibus');
            $table->foreignId('data_keluarga_id')->references('id')->on('data_keluargas')->onDelete('cascade');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('pendapatan');
            $table->string('agama');
            $table->string('alamat');
            $table->timestamps();

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
