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
        Schema::create('data_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('kacab');
            $table->string('no_kk');
            $table->string('alamat_kk');
            $table->string('kepala_keluarga');
            $table->string('wilayah_binaan');
            $table->string('shelter');
            $table->string('jarak_ke_shelter')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_rek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_keluargas');
    }
};
