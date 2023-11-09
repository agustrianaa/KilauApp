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
                'anaks.nama_lengkap as nama_lengkap_calon_anak',
                'anaks.tempat_lahir as tempat_lahir_calon_anak',
                'anaks.tanggal_lahir as tanggal_lahir_calon_anak',
                'ayahs.*',
                'ayahs.nama as nama_ayah',
                'ayahs.nik as nik_ayah',
                'anaks.*',
                'ibus.*',
                'walis.*',
                'status_anaks.*',
                )
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
                ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
                ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
                ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
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

    public function update(Request $request, $anak_id)
    {
        $data = StatusAnak::find($anak_id);

        $data->status_binaan = 1;

        $data->save();
    }

    public function showDetail(Request $request, $id)
    {
        // ini untuk detail data keluarga
        // Ambil data keluarga berdasarkan $id dari database
        $dataKeluarga = DataKeluarga::find($id);
        $dataIbu = Ibu::where('data_keluarga_id', $dataKeluarga->id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $dataKeluarga->id)->first();
        $dataAnak = Anak::where('data_keluarga_id', $dataKeluarga->id)
        ->where('nama_lengkap', $request->nama_lengkap)
        ->first();
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
            'kacab', 'no_kk', 'alamat_kk', 'kepala_keluarga', 'wilayah_binaan', 'shelter', 'jarak_ke_shelter', 'no_telp', 'no_rek'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    // Update Data Ayah~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function updatedAnak(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan']);
        }

        // Lakukan update data ayah
        $dataKeluarga->dataAnak->update($request->only([
            'nama_lengkap', 'nama_panggilan', 'anak_ke', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nama_sekolah', 'kelas_sekolah', 'nama_madrasah', 'kelas_madrasah', 'hobby', 'cita_cita'
        ]));

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
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
