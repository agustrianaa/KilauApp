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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id')->references('id')->on('keluargas')->unique();
            $table->string('pendidikan_kepala_keluarga');
            $table->string('jumlah_tanggungan');
            $table->string('pekerjaan_kepala_keluarga');
            $table->string('penghasilan');
            $table->string('kepemilikan_tabungan');
            $table->string('jumlah_makan');
            $table->string('kepemilikan_tanah');
            $table->string('kepemilikan_rumah');
            $table->string('kondisi_rumah_lantai');
            $table->string('kondisi_rumah_dinding');
            $table->string('kepemilikan_kendaraan');
            $table->string('kepemilikan_elektronik');
            $table->string('sumber_air_bersih');
            $table->string('jamban_limbah');
            $table->string('tempat_sampah');
            $table->string('perokok');
            $table->string('konsumen_miras');
            $table->string('persediaan_p3k');
            $table->string('makan_buah_sayur');
            $table->string('solat_lima_waktu');
            $table->string('membaca_alquran');
            $table->string('majelis_taklim');
            $table->string('membaca_koran');
            $table->string('pengurus_organisasi');
            $table->string('status_anak');
            $table->string('biaya_pendidikan_perbulan');
            $table->string('bantuan_lembaga_formal_lain');
            $table->text('kondisi_penerima_manfaat');
            $table->string('petugas_survey');
            $table->string('hasil_survey');
            $table->text('keterangan_hasil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
