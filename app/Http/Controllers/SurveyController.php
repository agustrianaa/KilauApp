<?php

namespace App\Http\Controllers;


use App\Models\DataKeluarga;
use App\Models\SurveyKeluarga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        if(request()->ajax()){
            // $data = DataKeluarga::latest()->get();
            $data = DataKeluarga::select(
                'data_keluargas.*',
                'data_keluargas.id as id_kel',
                'anaks.*',
                'status_anaks.*',
                'anaks.id_anaks as id_anaks',
                'anaks.nama_lengkap as nama_lengkap_anak',
                'anaks.nama_panggilan as nama_panggilan_anak',
                'anaks.tempat_lahir as tempat_lahir_anak',
                'anaks.tanggal_lahir as tanggal_lahir_anak',
                'anaks.nama_sekolah as nama_sekolah_anak',
                'anaks.nama_madrasah as nama_madrasah_anak',
                'anaks.hobby as hobby_anak',
                'anaks.cita_cita as cita_cita_anak',
                'ayahs.*',
                'ibus.*',
                'walis.*',
                'survey_keluargas.*',
                )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            ->where('status_anaks.status_binaan', 1)
            ->whereNotNull('survey_keluargas.id')
            ->orderBy('data_keluargas.created_at', 'asc')
            // ->where(function ($query) {
            //     $query->where('survey_keluargas.id', '!=', null) // Atau 'IS NOT NULL' tergantung pada DBMS Anda
            //         ->orWhere('survey_keluargas.id', 'IS NULL');
            // })
            ->get();


            return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . url("admin/surveyShow/" . $data->id_kel) . '" data-toggle="tooltip" data-id="' . $data->id_kel . '" data-original-title="View" class="view btn btn-sm btn-info view text-white"><i class="bi bi-clipboard2-plus"></i> Edit Survey</a>';
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

        // Menampilkan SweetAlert2 setelah data disimpan
        Alert::success('Tersimpan', 'Data telah berhasil disimpan!')->showConfirmButton(false);

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

    public function surveyShow($id)
    {
        $data = SurveyKeluarga::where('keluarga_id', $id)->first();

        return view('survey.surveyEdit', compact('data'));
    }
}
