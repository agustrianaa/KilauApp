<?php

namespace App\Http\Controllers;

use App\Models\calonAnakBinaan;
use App\Http\Requests\StorecalonAnakBinaanRequest;
use App\Http\Requests\UpdatecalonAnakBinaanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalonAnakBinaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $ambil = $request->ambil;
        // $anak = calonAnakBinaan::when($ambil, function ($query) use ($ambil) {
        //     return $query->where('nama', 'Faried Yoga Prawira');
        // })->latest()->get();
        // if($ambil === ''){
            //     $anak = calonAnakBinaan::latest().get();
            // } else {
                //     $anak = calonAnakBinaan::where('nama', 'Faried Yoga Prawira');
                // }

        // $output = "";
        // $anak = calonAnakBinaan::where('nama', 'LIKE', '%'.$request->ambil.'%')->orWhere('shelter', 'LIKE', '%'.$request->ambil.'%')->get();
        // foreach($anak as $an){
        //     $output .=
        //     '
        //     <div class="halo">
        //                         <tr id="index_'. $an->id .'">
        //                             <td>'. $an->nama .'</td>
        //                             <td>'. $an->shelter .'</td>
        //                             <td>'. $an->no_kk .'</td>
        //                             <td class="text-center">
        //                                 <a href="javascript:void(0)" id="btn-edit-an" data-id="'. $an->id .'" class="btn btn-primary btn-sm">EDIT</a>
        //                                 <a href="javascript:void(0)" id="btn-delete-an" data-id="'. $an->id .'" class="btn btn-danger btn-sm">DELETE</a>
        //                             </td>
        //                         </tr>
        //                     </div>
        //     ';
        // }
        if (request()->ajax()) {
            $nama = $request->nama;
            // $jenis_kelamin = $request->jenis_kelamin;
            // $status_binaan = $request->status_binaan;

            $data = calonAnakBinaan::select('*');

            if ($nama != '') {
                $data = $data->where('nama','LIKE', '%'.$nama.'%');
            }

            // if ($jenis_kelamin != '') {
            //     $data = $data->where('jenis_kelamin', $jenis_kelamin);
            // }

            // if ($status_binaan != '') {
            //     $data = $data->where('status_binaan', $status_binaan);
            // }

            return datatables($data)
                // ->addColumn('action')
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="javascript:void(0)" id="btn-edit-an" data-id="'. $data->id .'" class="btn btn-primary btn-sm">EDIT</a>';
                    $btn = $btn.'<a href="javascript:void(0)" id="btn-delete-an" data-id="'. $data->id .'" class="btn btn-danger btn-sm">DELETE</a>';

                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('calonAnak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'shelter'   => 'required',
            'no_kk'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $anak = calonAnakBinaan::create([
            'nama'     => $request->nama,
            'shelter'   => $request->shelter,
            'no_kk'   => $request->no_kk
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $anak
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show($id, calonAnakBinaan $calonAnakBinaan)
    {
        $calonAnakBinaan = calonAnakBinaan::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $calonAnakBinaan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(calonAnakBinaan $calonAnakBinaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, calonAnakBinaan $calonAnakBinaan)
    {
        $calonAnakBinaan = calonAnakBinaan::find($id);
         //define validation rules
         $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'shelter'   => 'required',
            'no_kk'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $calonAnakBinaan->update([
            'nama'     => $request->nama,
            'shelter'   => $request->shelter,
            'no_kk'   => $request->no_kk
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $calonAnakBinaan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        calonAnakBinaan::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]);
    }
}
