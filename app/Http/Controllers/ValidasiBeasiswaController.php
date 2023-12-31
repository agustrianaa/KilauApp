<?php

namespace App\Http\Controllers;


use App\Models\Anak;
use App\Models\Beasiswa;
use App\Models\DataKeluarga;
use App\Models\StatusAnak;
use Illuminate\Http\Request;

class ValidasiBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(DataKeluarga::select(
                'data_keluargas.*',
                'anaks.nama_lengkap as nama_lengkap_anak', 
                'anaks.tempat_lahir as tempat_lahir_anak', 
                'anaks.tanggal_lahir as tanggal_lahir_anak', 
                'ayahs.*',
                'ayahs.nama as nama_ayah', 
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
                ->where('status_anaks.status_beasiswa', 'Belum Validasi')
                ->get()
                )
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id_anaks; // Ambil ID dari baris data
                $beasiswaAct = '<a href="javascript:void(0)" onClick="validFunc(' . $id . ')" data-original-title="View" class="aktivasi btn btn-success btn-sm">Aktivasi</a>';
                return $beasiswaAct;
            })
            ->addColumn('kelayakan', function($row){
                $id = $row->id_anaks; // Ambil ID dari baris data
                $kelayakanAct = '<a href="javascript:void(0)" onClick="kelayakanFunc(' . $id . ')" data-original-title="View Kelayakan" class="kelayakan btn btn-info btn-sm">Kelayakan</a>';
                return $kelayakanAct;
            })
            ->rawColumns(['action', 'kelayakan'])
            ->make(true);
        }
        return view('validasiBeasiswa.validasibeasiswa');
    }

    public function validation(Request $request, $id)
    {
        $validasi = Anak::find($id);

        return view('validasiBeasiswa.validasi', compact('id', 'validasi'));
    }

    public function update(Request $request, $id_anaks)
    {
        // Gunakan first() untuk mengembalikan satu objek
        $validasi = StatusAnak::where('anak_id', $id_anaks)->first();
    
        // Pastikan objek ditemukan sebelum memproses pembaruan
        if ($validasi) {
            $validasi->update([
                'status_beasiswa' => $request->status_beasiswa
            ]);
        }
    
        return redirect()->route('admin.AnakBinaan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($anakId)
    {
        $anak = Anak::find($anakId);
        return view('validasiBeasiswa.validasi', compact('anak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        
        $validasi = $request->validate([
            'status_binaan' => 'required|in:PB,BCPB,NPB',
        ]);

        $idBeasiswa = $request->input('id');

        $beasiswa = new Beasiswa([
            'id' => $idBeasiswa,
            'status_binaan' => $validasi['status_binaan'],
            'anak_id' => $id,
        ]);

        $beasiswa->save();

        return redirect()->back()->with('success', 'Data beasiswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $beasiswaAnakId, $anakId)
    {
        $anak = Anak::find($anakId);
        $beasiswaAnak = Beasiswa::find($beasiswaAnakId);
        $beasiswaAnak = $anak->status_binaan;

        $validasi = Beasiswa::all();
        return view('validasiBeasiswa.validasi', compact('anak'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $anak = Beasiswa::find($id);

    //     $request->validate([
    //         'status_binaan' => 'required|in:PB,BCPB,NPB',
    //     ]);
    
    //     $anak->status_binaan = $request->input('status_binaan');
    //     $anak->save();
    
    //     return redirect()->back()->with('success', 'Data beasiswa berhasil diupdate.');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}