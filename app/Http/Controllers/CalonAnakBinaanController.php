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

class CalonAnakBinaanController extends Controller
{
    private $filteredData;
    public function calonanakbinaanIndex(Request $request)
    {
        $wilayah = KantorCabang::with('dataWilBin.dataShelter')->get();

        if (request()->ajax()) {
            $this->filteredData = $this->getFilteredData($request);

            return datatables($this->filteredData)
                ->addColumn('TTL', function ($data) {
                    return $data->tempat_lahir_calon_anak . ', ' . $data->tanggal_lahir_calon_anak;
                })
                ->addColumn('DiBuat', function ($data) {
                    return $data->DiBuat ? \Carbon\Carbon::parse($data->DiBuat)->isoFormat('D MMMM YYYY') : '-';
                })
                ->addColumn('DiUbah', function ($data) {
                    return $data->DiUbah ? \Carbon\Carbon::parse($data->DiUbah)->isoFormat('D MMMM YYYY') : '-';
                })
                ->addColumn('action', 'DataCalonAnakBinaan.CalonAnakBinaan-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('DataCalonAnakBinaan.CalonAnakBinaan', compact('wilayah'));
    }

    private function getFilteredData(Request $request)
    {
        $filteredData = DataKeluarga::select(
            'data_keluargas.*',
            'anaks.*',
            'anaks.data_keluarga_id as ID_Keluarga',
            'anaks.nama_lengkap as nama_lengkap_calon_anak',
            'anaks.tempat_lahir as tempat_lahir_calon_anak',
            'anaks.tanggal_lahir as tanggal_lahir_calon_anak',
            'anaks.agama as agamaAnak',
            'anaks.created_at as DiBuat',
            'anaks.updated_at as DiUbah',
            'ayahs.*',
            'ayahs.nama as nama_ayah',
            'ayahs.nik as nik_ayah',
            'ibus.*',
            'walis.*',
            'status_anaks.*'
        )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            ->orderBy('anaks.id_anaks', 'desc')
            ->when($request->has('kacab'), function ($query) use ($request) {
                $kacab = $request->kacab;
                return $query->whereIn('anaks.kacab', $kacab);
            })
            ->when($request->has('wilbin'), function ($query) use ($request) {
                $wilbin = $request->wilbin;
                return $query->whereIn('anaks.wilayah_binaan', $wilbin);
            })
            ->when($request->has('shelters'), function ($query) use ($request) {
                $shelters = $request->shelters;
                return $query->whereIn('anaks.shelter', $shelters);
            })
            ->when($request->has('noKK'), function ($query) use ($request) {
                $noKK = $request->noKK;
                return $query->where('data_keluargas.no_kk', 'LIKE', "%$noKK%");
            }) 
            ->where('status_anaks.status_binaan', 0)
            ->get();

        return $filteredData;
    }


    public function cariWilayahBinaan(Request $request)
    {
        try {
            $kacabId = $request->input('kantorId');

            $wilayahBinaan = WilayahBinaan::where('kacab_id', $kacabId)->get(['id_wilbin', 'nama_wilbin']);

            return response()->json([
                'status' => 'success',
                'data' => $wilayahBinaan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function cariShelters(Request $request)
    {
        try {
            $wilbinsID = $request->input('wilbinId');

            $shelters = Shelter::where('wilbin_id', $wilbinsID)->get(['id_shelter', 'nama_shelter']);

            return response()->json([
                'status' => 'success',
                'data' => $shelters,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
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
