<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\KantorCabang;
use App\Models\Shelter;
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
        $totalDataKaCab = KantorCabang::count();
        $totalDataWilbin = WilayahBinaan::count();
        $totalDataShelter = Shelter::count();
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
        ], compact('totalDataKaCab', 'totalDataWilbin', 'totalDataShelter'));
    }

    public function KaCabIndex(Request $request) {
        if (request()->ajax()) {
            $data = KantorCabang::select('*')
                ->orderBy('kantor_cabangs.updated_at', 'desc')
                ->get();

            return datatables($data)
                ->addColumn('action', 'Settings.Wilayah.tombolAction.settingKaCab-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return View('Settings.Wilayah.settingKaCab');
    }

    public function getKacab($id_kacab)
    {
        $kacab = KantorCabang::find($id_kacab);
        return response()->json($kacab);
    }

    public function updateKacab(Request $request, $id_kacab)
    {
        $kacab = KantorCabang::find($id_kacab);
        $kacab->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
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


    // Wilayah Binaan ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function WilBinIndex(Request $request) {
        if (request()->ajax()) {
            $data = WilayahBinaan::select(
                    'wilayah_binaans.*',
                    'kantor_cabangs.nama_kacab'
                )
                ->leftJoin('kantor_cabangs', 'kantor_cabangs.id_kacab', '=', 'wilayah_binaans.kacab_id')
                ->orderBy('wilayah_binaans.updated_at', 'desc')
                ->get();
    
            return datatables($data)
                ->addColumn('action', 'Settings.Wilayah.tombolAction.settingWilBin-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return View('Settings.Wilayah.settingWilBin');
    }

    public function getWilbin($id_wilbin)
    {
        $wilbin = WilayahBinaan::find($id_wilbin);
        return response()->json($wilbin);
    }

    public function updateWilbin(Request $request, $id_wilbin)
    {
        $wilbin = WilayahBinaan::find($id_wilbin);
        $wilbin->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function deleteWilbin(Request $request) {
        $id_wilbin = $request->input('id_wilbin');

        $wilbin = WilayahBinaan::find($id_wilbin);

        if ($wilbin) {
            $wilbin->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Kantor Cabang tidak ditemukan.']);
        }
    }
    public function tambahWilBin(Request $request) {
        return View('Settings.Wilayah.tambahWilayah.tambahWilBin');
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


    // Shelter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function ShelterIndex(Request $request) {
        if (request()->ajax()) {
            $data = Shelter::select(
                    'shelters.*',
                    'wilayah_binaans.nama_wilbin'
                )
                ->leftJoin('wilayah_binaans', 'wilayah_binaans.id_wilbin', '=', 'shelters.wilbin_id')
                ->orderBy('shelters.updated_at', 'desc')
                ->get();
    
            return datatables($data)
                ->addColumn('action', 'Settings.Wilayah.tombolAction.settingShelter-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    
        return view('Settings.Wilayah.settingShelter');
    }

    public function getShelter($id_shelter)
    {
        $shelter = Shelter::find($id_shelter);
        return response()->json($shelter);
    }

    public function updateShelter(Request $request, $id_shelter)
    {
        $shelter = Shelter::find($id_shelter);
        $shelter->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }
    public function deleteShelter(Request $request) {
        $id_shelter = $request->input('id_shelter');

        $shelter = Shelter::find($id_shelter);

        if ($shelter) {
            $shelter->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Kantor Cabang tidak ditemukan.']);
        }
    }
    public function tambahShelter(Request $request) {
        return View('Settings.Wilayah.tambahWilayah.tambahShelter');
    }
    public function getWilayahBinaan(Request $request) {
        $term = $request->term;
        $wilayahBinaans = WilayahBinaan::where('nama_wilbin', 'like', '%' . $term . '%')->get();

        $results = [];
        foreach ($wilayahBinaans as $wilayahBinaan) {
            $results[] = [
                'id' => $wilayahBinaan->id_wilbin,
                'text' => $wilayahBinaan->nama_wilbin,
            ];
        }

        return response()->json($results);
    }
    public function simpanGetWilbin(Request $request) {
        
        Shelter::create([
            'wilbin_id' => $request->idUntukWilbin,
            'nama_shelter' => $request->namaShelter,
            'nama_koordinator' => $request->koorShelter,
            'no_hp' => $request->noHP,
            'alamat' => $request->alamatShelter,
        ]);

        $alert = [
            'title' => 'Shelter ditambahkan!',
            'icon' => 'success',
        ]; 

        // Redirect atau lakukan tindakan lain sesuai kebutuhan
        return redirect()->route('admin.ShelterView')->with('alert', $alert);
    }

}