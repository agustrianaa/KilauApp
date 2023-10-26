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
        SurveyKeluarga::create($request->all());
        // SurveyKeluarga::create([
        //     'keluarga_id' => $request->keluarga_id,
        //     'kep_tanah' => $request->kep_tanah,
        //     'kep_rumah' => $request->kep_rumah,
        //     'lantai' => $request->lantai,
        //     'dinding' => $request->dinding,
        //     'kep_kendaraan' => $request->kep_kendaraan,
        //     'kep_elektronik' => $request->kep_elektronik,
        //     'sumber_air' => $request->sumber_air,
        //     'jamban' => $request->jamban,
        //     'tempat_sampah' => $request->tempat_sampah,
        //     'perokok' => $request->perokok,
        //     'miras' => $request->miras,
        //     'p3k' => $request->p3k,
        //     'makan_sayur' => $request->makan_sayur,
        //     'sholat' => $request->sholat,
        //     'baca_quran' => $request->baca_quran,
        //     'majelis_taklim' => $request->majelis_taklim,
        //     'pengurus_organisasi' => $request->pengurus_organisasi,
        //     'status_anak' => $request->status_anak,
        //     'biaya_pendidikan' => $request->biaya_pendidikan,
        //     'bantuan_lembaga_formal' => $request->bantuan_lembaga_formal,
        //     'resume' => $request->resume,
        //     'petugas_survey' => $request->petugas_survey,
        // ]);

        return redirect()->route('admin.surveyAnak');
    }

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
