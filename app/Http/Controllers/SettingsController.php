<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\KantorCabang;
use App\Models\StatusAnak;
use App\Models\Wali;
use App\Models\WilayahBinaan;
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
        if (request()->ajax()) {
            $data = KantorCabang::select('*')
                ->get();

            return datatables($data)
                ->addColumn('action', 'Settings.Wilayah.tombolAction.tambahKaCab-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return View('Settings.Wilayah.settingKaCab');
    }
    public function WilBinIndex(Request $request) {
        if (request()->ajax()) {
            $data = KantorCabang::select(
                'kantor_cabangs.*',
                'wilayah_binaans.*',
                )
                ->leftJoin('wilayah_binaans', 'kantor_cabangs.id_kacab', '=', 'wilayah_binaans.kacab_id')
                ->orderBy('wilayah_binaans.updated_at', 'desc')
                ->get();

            return datatables($data)
                ->addColumn('action', 'Settings.Wilayah.tombolAction.tambahWilBin-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return View('Settings.Wilayah.settingWilBin');
    }
    public function ShelterIndex(Request $request) {
        return View('Settings.Wilayah.settingShelter');
    }

    public function tambahKacab(Request $request) {
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

        return view('Settings.Wilayah.tambahWilayah.tambahKaCab', [
            'provinces' => $provinces,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);
    }

    public function tambahWilBin(Request $request) {
        return View('Settings.Wilayah.tambahWilayah.tambahWilBin');
    }

    public function tambahShelter(Request $request) {
        return View('Settings.Wilayah.tambahWilayah.tambahShelter');
    }

    public function simpanKaCab(Request $request) {

        $request->validate([
            'namaKacab' => 'required',
            'nomortlp' => 'required',
            'alamatKacab' => 'required',
            'tbhProvinsi' => 'required',
            'tbhKabupaten' => 'required',
            'tbhKecamatan' => 'required',
            'tbhKelurahan' => 'required',
        ]);

        KantorCabang::create([
            'nama_kacab' => $request->namaKacab,
            'no_telp' => $request->nomortlp,
            'alamat' => $request->alamatKacab,
            'provinsi' => $request->tbhProvinsi,
            'kabupaten' => $request->tbhKabupaten,
            'kecamatan' => $request->tbhKecamatan,
            'kelurahan' => $request->tbhKelurahan,
        ]);

        // Tambahkan kode SweetAlert2 sebelum redirect
        $alert = [
            'title' => 'Kantor Cabang ditambahkan!',
            'icon' => 'success',
        ]; 

        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('admin.KaCabView')->with('alert', $alert);
    }

    public function getKacab(Request $request)
    {
        $id_kacab = $request->input('id_kacab');

        $kacab = KantorCabang::find($id_kacab);

        return response()->json($kacab);
    }

    public function updateKacab(Request $request, $id_kacab)
    {
        // // Lakukan validasi atau proses lain sesuai kebutuhan
        // $id_kacab = $request->input('id_kacab');

        $kacab = KantorCabang::find($id_kacab);

        if (!$kacab) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        $kacab->update($request->only([
            'nama_kacab',
            'no_telp',
            'alamat',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan'
        ]));

        return response()->json(['success' => true]);
    }

    public function deleteKacab(Request $request)
    {
        $id_kacab = $request->input('id_kacab');

        // Lakukan validasi atau proses lain sesuai kebutuhan

        $kacab = KantorCabang::find($id_kacab);

        if ($kacab) {
            $kacab->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Kantor Cabang tidak ditemukan.']);
        }
    }

    public function getKantorCabang(Request $request)
    {
        $term = $request->term;
        $kantorCabangs = KantorCabang::where('nama_kacab', 'like', '%' . $term . '%')->get();

        $results = [];
        foreach ($kantorCabangs as $kantorCabang) {
            $results[] = [
                'id' => $kantorCabang->id_kacab,
                'text' => $kantorCabang->nama_kacab,
            ];
        }

        return response()->json($results);
    }

    public function simpanGetKacab(Request $request) {
        
        WilayahBinaan::create([
            'kacab_id' => $request->idUntukKacab,
            'nama_wilbin' => $request->namaWilbin,
        ]);

        $alert = [
            'title' => 'Wilayah Binaan ditambahkan!',
            'icon' => 'success',
        ]; 

        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('admin.WilBinView')->with('alert', $alert);
    }

}