<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Shelter;
use App\Models\Tutor;
use App\Models\WilayahBinaan;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $key = 0;
        if (request()->ajax()) {
            $data = Tutor::select('id_tutor as id', 'nama', 'pendidikan', 'email', 'no_hp', 'mapel')
    ->get();
            
            return datatables($data)
                ->addColumn('no', function ($row) use (&$key) {
                    return ++$key;
                })
                ->addColumn('action', function ($row) {
                    // dd($row);
                    $id = $row->id;
                    $act = '<a href="javascript:void(0)" onClick="viewTutor(' . $id . ')" data-original-title="View Tutor" class="view-tutor btn btn-info btn-sm"><i class="fas fa-eye"></i></a>';
                    $act .= '<a href="javascript:void(0)" onClick="editTutor(' . $id . ')" data-original-title="Edit Tutor" class="edit-tutor btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i></a>';
                    $act .= '<a href="javascript:void(0)" onClick="hapusTutor(' . $id . ')" data-original-title="Hapus Tutor" class="hapus-tutor btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></a>';
                    return $act;
                })
                ->rawColumns(['no','action']) // Tambahkan ini jika Anda menggunakan HTML di kolom
                ->make(true);
        }

        return view('Tutor.TutorTabel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kacab = KantorCabang::all();
        $wilbin = WilayahBinaan::all();
        $shelter = Shelter::all();
        return view('Tutor.TambahTutor', compact('kacab', 'wilbin', 'shelter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tutorId = $request->id;
        $kacabId = $request->input('kacab');
        $wilbinId = $request->input('wilbin');

        $tutor = Tutor::updateOrCreate(
            [
                'id_tutor' => $tutorId,
            ],
            [
                'kacab_id' =>$kacabId,
                'wilbin_id' =>$wilbinId,
                'shelter_id' =>$request->shelter,
                'nama' => $request->namaTutor,
                'pendidikan' => $request->pend,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'mapel' => $request->mapel,
                'status' => $request->status,
            ]   
        );
        return Response()->json($tutor);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutor = Tutor::find($id);
        return response()->json(['tutor' => $tutor]);
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
    public function destroy(Request $request)
    {
        $tutor = Tutor::where('id_tutor', $request->id)->delete();
        return Response()->json($tutor);
    }
}
