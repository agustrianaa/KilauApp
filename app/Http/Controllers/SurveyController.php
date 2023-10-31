<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\SurveyKeluarga;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        if(request()->ajax()){
            $data = DataKeluarga::latest()->get();

            return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . url("admin/surveyForm/" . $data->id) . '" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="View" class="view btn btn-sm btn-info view text-white"><i class="bi bi-clipboard2-plus"></i> Isi Survey</a>';

                return $btn;
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        return view('survey.SurveyTabel');
    }

    public function surveyForm($id)
    {
        return view('survey.SurveyForm', compact('id'));
    }

    public function store(Request $request)
    {
        // Mengambil semua nilai yang dipilih dari checkbox "kep_kendaraan" sebagai array
        $resultText = $request->input('kep_kendaraan');  

        // Mengganti input "kep_kendaraan" dengan string yang berisi nilai yang dipilih
        $request->merge(['kep_kendaraan' => $resultText]); 

        SurveyKeluarga::create($request->all());    

        return redirect()->route('admin.surveyAnak');
    }

    
    
//     public function storae(Request $request)
// {
//     // Mengambil semua nilai yang dipilih dari checkbox "kep_kendaraan" sebagai array
//     $selectedKendaraan = $request->input('kep_kendaraan');

//     // Menggabungkan array menjadi satu string dengan koma sebagai pemisah
//     $kendaraanString = implode(', ', $selectedKendaraan);

//     // Mengganti input "kep_kendaraan" dengan string yang berisi nilai yang dipilih
//     $request->merge(['kep_kendaraan' => $kendaraanString]);

//     SurveyKeluarga::create($request->all());

//     return redirect()->route('admin.surveyAnak');
// }


    public function show(SurveyController $surveyController)
    {

    }


    public function edit(SurveyController $surveyController)
    {
        //
    }

    public function update(Request $request, SurveyController $surveyController)
    {

    }


    public function destroy(SurveyController $surveyController)
    {

    }
}
