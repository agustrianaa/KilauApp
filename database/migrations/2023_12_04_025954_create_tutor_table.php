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
        Schema::create('tutor', function (Blueprint $table) {
            $table->id('id_tutor');
            $table->string('nama');
            $table->string('pendidikan');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->foreignId('kacab_id')->references('id_kacab')->on('kantor_cabangs')->onDelete('cascade');
            $table->foreignId('wilbin_id')->references('id_wilbin')->on('wilayah_binaans')->onDelete('cascade');
            $table->foreignId('shelter_id')->references('id_shelter')->on('shelters')->onDelete('cascade');
            $table->string('mapel');
            $table->string('foto')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor');
    }
};
