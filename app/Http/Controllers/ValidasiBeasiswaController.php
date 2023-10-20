<?php

namespace App\Http\Controllers;

use App\Models\Anak;
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
            return datatables()->of(Anak::select('*'))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id_anaks; // Ambil ID dari baris data
                $beasiswaAct = '<a href="javascript:void(0)" onClick="validFunc(' . $id . ')" data-original-title="View" class="aktivasi btn btn-success btn-sm">Aktivasi</a>';
                return $beasiswaAct; })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('validasiBeasiswa.validasibeasiswa');
    }

    public function validation(Request $request, $id)
    {
        $validasi = DataKeluarga::select(
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
            ->get()
            ->find($id);

        return view('validasiBeasiswa.validasi', compact('id', 'validasi'));
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
        $validasi = $request->validate([
            'status_binaan' => 'required|in:PB,BCPB,NPB',
        ]);

        if($request->has('id')) {
            $id = $request->input('id');
            $status_binaan = StatusAnak::findOrFail($id);
            $status_binaan->update($validasi);
            return redirect()->route('admin.validasi',['id' => $id])->with('success', 'Data berhasil diperbarui');
        // } else {
        //     tabeldata::create($validasi);
            
        //     return redirect()->route('admin.validasi, $id')->with('success', 'Data berhasil diperbarui');
        }

    }

    public function saveValidasi(Request $request) {
        // Lakukan validasi data yang diterima dari request
        // Simpan data sesuai dengan nilai yang diterima ($request->status_binaan)
        
        // Contoh: Simpan ke database
        $id = $request->id_anaks; // Ambil ID dari baris data
        $dataKeluarga = StatusAnak::find($id); // Gantilah ini dengan cara yang sesuai untuk mendapatkan objek DataKeluarga
        $dataKeluarga->status_binaan = $request->status_binaan;
        $dataKeluarga->save();
        
        return response()->json(['message' => 'Data berhasil disimpan.']);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
