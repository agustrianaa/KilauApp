<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
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
            $data = Tutor::select('*');
    
            return datatables($data)
            ->addColumn('no', function ($row) use (&$key) {
                return ++$key;
            })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    $act = '<a href="javascript:void(0)" onClick="editDonatur(' . $id . ')" data-original-title="Edit Donatur" class="edit-donatur btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                    $act .= '<a href="javascript:void(0)" onClick="hapusDonatur(' . $id . ')" data-original-title="Hapus Donatur" class="hapus-donatur btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></a>';
                    return $act;
                })
                ->rawColumns(['action']) // Tambahkan ini jika Anda menggunakan HTML di kolom
                ->make(true);
        }
    
        return view('Tutor.TutorTabel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tutor.TambahTutor');
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
