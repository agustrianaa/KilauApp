<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use Illuminate\Http\Request;

class IbuController extends Controller
{
    public function getDataById($id_ibu)
    {
        $ibu = Ibu::find($id_ibu);

        if (!$ibu) {
            return response()->json(['error' => 'Data ibu tidak ditemukan'], 404);
        }

        return response()->json($ibu);
    }

    public function update(Request $request, $id_ibu)
{
    // Temukan data ibu berdasarkan ID
    $dataIbu = Ibu::find($id_ibu);

    if (!$dataIbu) {
        return response()->json(['error' => 'Data ibu tidak ditemukan'], 404);
    }


    // Update data ibu Secara Manual
    //VARIBLE -> FIELD DATABASE = $REQUEST -> MENGINPUT DATA ('SESUAI DENGAN ID DI FORM)
    $dataIbu->nik_ibu = $request->input('nik_ibu');
    $dataIbu->nama_ibu = $request->input('nama_ibu');
    $dataIbu->tempat_lahir = $request->input('tempat_lahir');
    $dataIbu->tanggal_lahir = $request->input('tanggal_lahir');
    $dataIbu->agama = $request->input('agama');
    $dataIbu->alamat = $request->input('alamat');

    // Simpan perubahan
    $dataIbu->save();

    return response()->json(['success' => true]);
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
