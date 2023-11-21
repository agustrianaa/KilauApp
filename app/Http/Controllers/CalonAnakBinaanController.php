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

class CalonAnakBinaanController extends Controller
{
    public function calonanakbinaanIndex(Request $request)
    {
        if (request()->ajax()) {
            $data = DataKeluarga::select(
                'data_keluargas.*',
                'anaks.*',
                'anaks.nama_lengkap as nama_lengkap_calon_anak',
                // 'anaks.id_anaks as id_anak',
                'anaks.tempat_lahir as tempat_lahir_calon_anak',
                'anaks.tanggal_lahir as tanggal_lahir_calon_anak',
                'anaks.agama as agamaAnak',
                'ayahs.*',
                'ayahs.nama as nama_ayah',
                'ayahs.nik as nik_ayah',
                'ibus.*',
                'walis.*',
                'status_anaks.*',
                )
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
                ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
                ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
                ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                ->orderBy('anaks.id_anaks', 'desc')
                ->when($request->has('shelter'), function ($query) use ($request) {
                    $shelter = $request->shelter;
                    return $query->whereIn('shelter', $shelter);
                })
                ->when($request->has('agamaAnak'), function ($query) use ($request) {
                    $agamaAnak = $request->agamaAnak;
                    return $query->whereIn('anaks.agama', $agamaAnak);
                })            
                ->where('status_anaks.status_binaan', 0)
                ->get();

            return datatables($data)
                ->addColumn('TTL', function ($data) {
                    return $data->tempat_lahir_calon_anak . ', ' . $data->tanggal_lahir_calon_anak;
                })
                ->addColumn('action', 'DataCalonAnakBinaan.CalonAnakBinaan-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('DataCalonAnakBinaan.CalonAnakBinaan');
    }

    public function filterData(Request $request)
    {
        // Pastikan ada parameter 'shelters' yang dikirim dari Select2
        if ($request->has('shelters')) {
            $shelters = $request->shelters; 

            // Lakukan filter data berdasarkan nilai yang diterima dari Select2 Shelter
            $filteredData = DataKeluarga::whereIn('shelter', $shelters)->get(); 

            // Lakukan sesuatu dengan data yang difilter (misalnya, kirim kembali sebagai respons)
            return response()->json($filteredData);
        }   

        // Jika tidak ada parameter 'shelters' atau terjadi kesalahan lain
        return response()->json(['message' => 'Invalid request']);
    }


    public function update(Request $request, $id_anaks)
    {
        try {
            $data = StatusAnak::where('anak_id', $id_anaks)->firstOrFail();
    
            $data->status_binaan = 1;
            $data->save();
    
            return response()->json(['success' => true, 'message' => 'Status binaan berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui status binaan']);
        }
    }

    public function showDetail(Request $request, $id, $id_anaks)
    {
        // ini untuk detail data keluarga
        // Ambil data keluarga berdasarkan $id dari database
        $dataKeluarga = DataKeluarga::find($id);
        $dataIbu = Ibu::where('data_keluarga_id', $dataKeluarga->id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $dataKeluarga->id)->first();
        $dataAnak = Anak::where('id_anaks', $id_anaks)->first();
        $dataWali = Wali::where('data_keluarga_id', $dataKeluarga->id)->first();
        // Tampilkan halaman detail data keluarga (misalnya, menggunakan view 'detail_datakeluarga.blade.php')
        return view('DataCalonAnakBinaan.CalonAnakBinaan-view', [
            'dataKeluarga' => $dataKeluarga,
            'dataIbu' => $dataIbu,
            'dataAyah' => $dataAyah,
            'dataAnak' => $dataAnak,
            'dataWali' => $dataWali,
        ]);
    }

    // Update Data Keluarga~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updated(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        // Lakukan update data keluarga
        $dataKeluarga->update($request->only([
            'kacab', 'no_kk', 'alamat_kk', 'kepala_keluarga', 'no_telp', 'no_rek'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    // Update Data Ayah~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updatedAnak(Request $request, string $id_anaks)
    {
        $dataAnak = Anak::find($id_anaks);

        if (!$dataAnak) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        try {
            // Lakukan update data anak
            $dataAnak->update($request->only([
                'nama_lengkap', 'nama_panggilan', 'agama', 'anak_ke', 'jenis_kelamin', 'tempat_lahir', 'wilayah_binaan', 'shelter', 'jarak_ke_shelter', 'tanggal_lahir', 'nama_sekolah', 'kelas_sekolah', 'nama_madrasah', 'kelas_madrasah', 'hobby', 'cita_cita'
            ]));
    
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } catch (\Exception $e) {
            // Jika terjadi error saat update, kirim response error
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui data. Error: ' . $e->getMessage()]);
        }
    }


    // Update Data Ayah~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updatedAyah(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        // Lakukan update data ayah
        $dataKeluarga->dataAyah->update($request->only([
            'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'jumlah_tanggungan', 'pendapatan', 'agama', 'alamat'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    // Update Data Ibu~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updatedIbu(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        // Lakukan update data ibu
        $dataKeluarga->dataIbu->update($request->only([
            'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'pendapatan', 'agama', 'alamat'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }

    // Update Data Wali~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updatedWali(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        // Lakukan update data wali
        $dataKeluarga->dataWali->update($request->only([
            'no_ktp', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'jumlah_tanggungan', 'pendapatan', 'data_keluarga_id'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    // Hapus Data
    public function destroyd(Request $request)
    {
        $datakeluarga = DataKeluarga::where('id', $request->id)->delete();

        return Response()->json($datakeluarga);
    }
}
