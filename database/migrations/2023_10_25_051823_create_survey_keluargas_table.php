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
        Schema::create('survey_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id')->references('id')->on('data_keluargas')->cascadeOnDelete();
            // asset
            $table->string('kep_tanah');
            $table->string('kep_rumah');
            $table->string('lantai');
            $table->string('dinding');
            $table->string('kep_kendaraan');
            $table->string('kep_elektronik');

            // kesehatan
            $table->string('sumber_air');
            $table->string('jamban');
            $table->string('tempat_sampah');
            $table->string('perokok');
            $table->string('miras');
            $table->string('p3k');
            $table->string('makan_sayur');

            // ibadah & sosial
            $table->string('sholat');
            $table->string('baca_quran');
            $table->string('majelis_taklim');
            $table->string('pengurus_organisasi');

            // lainnya
            $table->string('status_anak');
            $table->string('biaya_pendidikan');
            $table->string('bantuan_lembaga_formal');

            // data suvey
            $table->text('resume');
            $table->string('petugas_survey');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_keluargas');
    }
};
