<?php

namespace App\Http\Controllers;

use App\Models\tabeldata;
use Illuminate\Http\Request;

class ValidasiBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(tabeldata::select('*'))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $beasiswaAct = '<a href="javascript:void(0)" class="aktivasi btn btn-success btn-sm">Aktivasi</a>';
                return $beasiswaAct; })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('validasiBeasiswa.validasibeasiswa');
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
