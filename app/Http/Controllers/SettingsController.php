<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\StatusAnak;
use App\Models\Wali;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;

class SettingsController extends Controller
{
    private function getDataFromApi($url)
    {
        $client = new Client();
        $response = $client->get($url);

        // Ambil data sebagai array
        $data = json_decode($response->getBody(), true);

        return $data;
    }
    public function settingIndex(Request $request)
    {
        // Mengambil data provinsi dari API (contoh URL, ganti sesuai kebutuhan)
        $provinces = $this->getDataFromApi('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        // Misalnya, pilih provinsi pertama sebagai contoh
        $provinceId = $provinces[0]['id'];

        // Mengganti placeholder dengan actual provinceId
        $kabupaten = $this->getDataFromApi("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");

        // Mengambil data kecamatan dari API (contoh URL, ganti sesuai kebutuhan)
        // Misalnya, pilih kabupaten pertama sebagai contoh
        $regencyId = $kabupaten[0]['id'];
        $kecamatan = $this->getDataFromApi("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$regencyId}.json");

        // Mengambil data kelurahan dari API (contoh URL, ganti sesuai kebutuhan)
        // Misalnya, pilih kecamatan pertama sebagai contoh
        $districtId = $kecamatan[0]['id'];
        $kelurahan = $this->getDataFromApi("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$districtId}.json");

        return view('Settings.DashboardSettings', [
            'provinces' => $provinces,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);
    }

    public function KaCabIndex(Request $request) {
        return View('Settings.Wilayah.settingKaCab');
    }
    public function WilBinIndex(Request $request) {
        return View('Settings.Wilayah.settingWilBin');
    }
    public function ShelterIndex(Request $request) {
        return View('Settings.Wilayah.settingShelter');
    }

    public function tambahKacab(Request $request) {
        // Mengambil data provinsi dari API (contoh URL, ganti sesuai kebutuhan)
        $provinces = $this->getDataFromApi('https://alamat.thecloudalert.com/api/provinsi/get/');

        // dd($provinces);
        return view('Settings.Wilayah.tambahWilayah.tambahKaCab', [
            'provinces' => $provinces,
        ]);

    }
}
