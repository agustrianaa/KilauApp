<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 

class DatakeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $fwilbin = $request->wilbin;
            $data = DataKeluarga::select('*')
            ->where(function($q) use($fwilbin) {
                if($fwilbin != ''){
                    $q->where('wilbin', $fwilbin);
                }
            });

            return datatables($data)
            ->addColumn('action', 'dataKeluarga.datakeluarga-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dataKeluarga.datakeluarga');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
        */
    public function store(Request $request)
    {
        $keluargaId = $request->id;

        try {
            $datakeluarga = DataKeluarga::updateOrCreate(
                [
                    'id' => $keluargaId
                ],
                [
                    'no_kk' => $request->no_kk,
                    'kepala_keluarga' => $request->kepala_keluarga,
                    'kacab' => $request->kacab,
                    'wilbin' => $request->wilbin,
                    'shelter' => $request->shelter,
                ]);

            // AYAAAHH
            $dataAyah = Ayah::create(
                [
                    'data_keluarga_id' => $datakeluarga->id,
                    'nik_ayah' => $request->nik_ayah,
                    'nama_ayah' => $request->nama_ayah,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                ]
            );

            // IBUUUU
            $dataIbu = Ibu::create(
                [
                    'data_keluarga_id' => $datakeluarga->id,
                    'nik_ibu' => $request->nik_ibu,
                    'nama_ibu' => $request->nama_ibu,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'agama' => $request->agama,
                    'alamat' => $request->alamat,
                    'pekerjaan' => $request->pekerjaan,
                ]
            );

            // Gunakan SweetAlert untuk menampilkan pesan sukses
            Alert::success('Sukses', 'Data Berhasil disimpan!');

            // Redirect pengguna ke halaman yang sesuai
            return redirect('datakeluarga');
        } catch (\Exception $e) {
            // Gunakan SweetAlert untuk menampilkan pesan kesalahan
            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());

            // Redirect pengguna kembali ke halaman sebelumnya
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ini untuk detail data keluarga
        // Ambil data keluarga berdasarkan $id dari database
        $dataKeluarga = DataKeluarga::find($id);
        $dataIbu = Ibu::where('data_keluarga_id', $id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $id)->first();
        // Tampilkan halaman detail data keluarga (misalnya, menggunakan view 'detail_datakeluarga.blade.php')
        return view('dataKeluarga.detail_datakeluarga', ['dataKeluarga' => $dataKeluarga, 'dataIbu' => $dataIbu, 'dataAyah' => $dataAyah]);

        //data ibu
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataKeluarga = DataKeluarga::find($id);

        $dataKeluarga->update($request->all());

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $datakeluarga = DataKeluarga::where('id', $request->id)->delete();

        return Response()->json($datakeluarga);
    }
}
