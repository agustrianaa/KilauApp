<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data provinsi yang diberikan
        $provinsis = [
            'Nanggroe Aceh Darussalam',//1
            'Sumatera Utara',//2
            'Sumatera Selatan',//3
            'Sumatera Barat',//4
            'Bengkulu',//5
            'Riau',//6
            'Kepulauan Riau',//7
            'Jambi',//8
            'Lampung',//9
            'Bangka Belitung',//10
            'Kalimantan Barat',//11
            'Kalimantan Timur',//12
            'Kalimantan Selatan',//13
            'Kalimantan Tengah',//14
            'Kalimantan Utara',//15
            'Banten',//16
            'DKI Jakarta',//17
            'Jawa Barat',//18
            'Jawa Tengah',//19
            'Daerah Istimewa Yogyakarta',//20
            'Jawa Timur',//21
            'Bali',//22
            'Nusa Tenggara Timur',//23
            'Nusa Tenggara Barat',//24
            'Gorontalo',//25
            'Sulawesi Barat',//26
            'Sulawesi Tengah',//27
            'Sulawesi Utara',//28
            'Sulawesi Tenggara',//29
            'Sulawesi Selatan',//30
            'Maluku Utara',//31
            'Maluku',//32
            'Papua Barat',//33
            'Papua',//34
        ];

        // Masukkan data ke dalam tabel
        foreach ($provinsis as $provinsi) {
            DB::table('provinsis')->insert(['nama_provinsi' => $provinsi]);
        }
    }
}
