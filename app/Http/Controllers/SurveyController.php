<?php

namespace App\Http\Controllers;


use App\Models\Anak;
use App\Models\DataKeluarga;
use App\Models\KantorCabang;
use App\Models\Shelter;
use App\Models\SurveyKeluarga;
use App\Models\WilayahBinaan;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SurveyController extends Controller
{
    public function indexSurvey(Request $request)
    {
        $data = KantorCabang::all();
        // $data = DataKeluarga::select(
        //     'data_keluargas.id',
        //     'data_keluargas.kacab',
        //     // 'anaks.id_anaks',
        //     // 'anaks.data_keluarga_id',
        //     // 'status_anaks.*',
        //     'survey_keluargas.keluarga_id',
        // )
        // // // ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        // // ->leftJoin('anaks', function ($join) {
        // //     $join->on('data_keluargas.id', '=', 'anaks.data_keluarga_id')
        // //         ->where('anaks.id_anaks', '=', DB::raw('(SELECT MAX(id_anaks) FROM anaks WHERE anaks.data_keluarga_id = data_keluargas.id)'));
        // // })

        // // ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        // ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
        // // ->where('status_anaks.status_binaan', 1)
        // // ->where('status_anaks.status_binaan', '=', 1)

        // // ->whereRaw('anaks.id_anaks IN (SELECT MAX(id_anaks) FROM anaks GROUP BY data_keluarga_id)') // Memilih satu anak dengan id_anaks tertinggi
        // ->whereNotNull('survey_keluargas.id')
        // ->orderBy('data_keluargas.created_at', 'asc')
        // ->get();
        if(request()->ajax()){
            $kacab = $request->kacab;
            $wilayah_binaan = $request->wilayah_binaan;
            $shelter = $request->shelter;
            // $data = DataKeluarga::select(
            //     'data_keluargas.*',
            //     'data_keluargas.id as id_kel',
            //     'status_anaks.*',
            //     'anaks.id_anaks',
            //     'anaks.wilayah_binaan',
            //     'anaks.shelter',
            //     'survey_keluargas.id',
            //     'survey_keluargas.keluarga_id',
            //     )
            // ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            // ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            // ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            // ->where('status_anaks.status_binaan', 1)
            // ->whereNotNull('survey_keluargas.id')
            // ->orderBy('data_keluargas.created_at', 'asc')
            // ->when(isset($kacab), function ($query) use ($kacab) {
            //         $query->whereIn('kacab', $kacab);
            // })
            // ->when(isset($wilayah_binaan), function ($query) use ($wilayah_binaan) {
            //         $query->whereIn('wilayah_binaan', $wilayah_binaan);
            // })
            // ->when(isset($shelter), function ($query) use ($shelter) {
            //         $query->whereIn('shelter', $shelter);
            // })
            // ->get();

            $data = DataKeluarga::select(
                'data_keluargas.id',
                'anaks.data_keluarga_id as foreignId',
                'survey_keluargas.keluarga_id',
                DB::raw('count(id_anaks) as id_kel'),
                DB::raw('GROUP_CONCAT(DISTINCT data_keluargas.no_kk) as no_kk'),
                DB::raw('GROUP_CONCAT(DISTINCT data_keluargas.kepala_keluarga) as kepala_keluarga'),
                DB::raw('GROUP_CONCAT(DISTINCT anaks.kacab) as kacab'),
                DB::raw('GROUP_CONCAT(DISTINCT anaks.wilayah_binaan) as wilayah_binaan'),
                DB::raw('GROUP_CONCAT(DISTINCT anaks.shelter) as shelter'),
            )
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->join('status_anaks', function ($join) {
                $join->on('anaks.id_anaks', '=', 'status_anaks.anak_id')
                    ->where('status_anaks.status_binaan', 1);
            })
            ->whereNotNull('survey_keluargas.id')
            ->when(isset($kacab), function ($query) use ($kacab) {
                    $query->whereIn('anaks.kacab', $kacab);
            })
            ->when(isset($wilayah_binaan), function ($query) use ($wilayah_binaan) {
                    $query->whereIn('anaks.wilayah_binaan', $wilayah_binaan);
            })
            ->when(isset($shelter), function ($query) use ($shelter) {
                    $query->whereIn('anaks.shelter', $shelter);
            })
            ->groupBy('foreignId', 'data_keluargas.id', 'survey_keluargas.keluarga_id')
            ->get();

            return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {

                $btn = '<a href="' . url("admin/surveyShow/" . $data->id) . '" data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="View" class="view btn btn-sm btn-info view text-white"><i class="bi bi-clipboard2-plus"></i> Edit Survey</a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('survey.SurveyTabel', compact('data'));

    }
    public function wilbin(Request $request)
    {
        $kacab = $request->kacab;
        if(request()->ajax()){
            if(isset($kacab)){

                // $data = DataKeluarga::select(
                //     'data_keluargas.id',
                //     'anaks.id_anaks',
                //     'anaks.data_keluarga_id',
                //     'anaks.shelter',
                //     'anaks.wilayah_binaan',
                //     'status_anaks.*',
                //     'survey_keluargas.id',
                //     'survey_keluargas.keluarga_id',
                // )
                // ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                // ->leftJoin('anaks', function ($join) {
                //     $join->on('data_keluargas.id', '=', 'anaks.data_keluarga_id')
                //         ->where('anaks.id_anaks', '=', DB::raw('(SELECT MAX(id_anaks) FROM anaks WHERE anaks.data_keluarga_id = data_keluargas.id)'));
                // })

                // ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                // ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
                // // ->where('status_anaks.status_binaan', 1)
                // ->where('status_anaks.status_binaan', '=', 1)

                // // ->whereRaw('anaks.id_anaks IN (SELECT MAX(id_anaks) FROM anaks GROUP BY data_keluarga_id)') // Memilih satu anak dengan id_anaks tertinggi
                // ->whereNotNull('survey_keluargas.id')
                // ->orderBy('data_keluargas.created_at', 'asc')
                // ->when(isset($kacab), function ($query) use ($kacab) {
                //         $query->whereIn('kacab', $kacab);
                // })
                // ->get();
                $data = WilayahBinaan::whereIn('kacab_id', $kacab)->get();

                return response()->json($data);
            }
        }
    }
    public function shelter(Request $request)
    {
        $wilbin = $request->wilayah_binaan;
        if(request()->ajax()){
            if(isset($wilbin)){

                // $data = DataKeluarga::select(
                //     'data_keluargas.id',
                //     'anaks.id_anaks',
                //     'anaks.data_keluarga_id',
                //     'anaks.shelter',
                //     'anaks.wilayah_binaan',
                //     'status_anaks.*',
                //     'survey_keluargas.id',
                //     'survey_keluargas.keluarga_id',
                // )
                // // ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                // ->leftJoin('anaks', function ($join) {
                //     $join->on('data_keluargas.id', '=', 'anaks.data_keluarga_id')
                //         ->where('anaks.id_anaks', '=', DB::raw('(SELECT MAX(id_anaks) FROM anaks WHERE anaks.data_keluarga_id = data_keluargas.id)'));
                // })

                // ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                // ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
                // // ->where('status_anaks.status_binaan', 1)
                // ->where('status_anaks.status_binaan', '=', 1)

                // // ->whereRaw('anaks.id_anaks IN (SELECT MAX(id_anaks) FROM anaks GROUP BY data_keluarga_id)') // Memilih satu anak dengan id_anaks tertinggi
                // ->whereNotNull('survey_keluargas.id')
                // ->orderBy('data_keluargas.created_at', 'asc')
                // ->when(isset($wilbin), function ($query) use ($wilbin) {
                //         $query->whereIn('wilayah_binaan', $wilbin);
                // })
                // ->get();

                $data = Shelter::whereIn('wilbin_id', $wilbin)->get();

                return response()->json($data);
            }
        }
    }

    public function surveyForm($id)
    {
        return view('survey.SurveyForm', compact('id'));
    }

    public function store(Request $request)
    {
        // Mengambil semua nilai yang dipilih dari checkbox "kep_kendaraan" sebagai array
        // $resultText = $request->input('kep_kendaraan');

        // Mengganti input "kep_kendaraan" dengan string yang berisi nilai yang dipilih
        // $request->merge(['kep_kendaraan' => $resultText]);

        $request->validate([
            'keluarga_id' => 'required',
            'kep_tanah' => 'required',
            'kep_rumah' => 'required',
            'lantai' => 'required',
            'dinding' => 'required',
            'kep_elektronik' => 'required',
            'sumber_air' => 'required',
            'jamban' => 'required',
            'tempat_sampah' => 'required',
            'perokok' => 'required',
            'miras' => 'required',
            'p3k' => 'required',
            'makan_sayur' => 'required',
            'sholat' => 'required',
            'baca_quran' => 'required',
            'majelis_taklim' => 'required',
            'pengurus_organisasi' => 'required',
            'status_anak' => 'required',
            'biaya_pendidikan' => 'required',
            'bantuan_lembaga_formal' => 'required',
            'resume' => 'required',
            'petugas_survey' => 'required',
            'kep_kendaraan' => 'required|array',
            'kep_kendaraan.*' => 'in:Sepeda,Motor,Mobil',
        ]);


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

        return view('survey.surveyEdit', compact('data', 'id'));
    }
    public function surveyEdit(Request $request, $id)
    {
        // $data = SurveyKeluarga::where('keluarga_id', $id)->first();
        $request->validate([
            'kep_tanah' => 'required',
            'kep_rumah' => 'required',
            'lantai' => 'required',
            'dinding' => 'required',
            'kep_elektronik' => 'required',
            'sumber_air' => 'required',
            'jamban' => 'required',
            'tempat_sampah' => 'required',
            'perokok' => 'required',
            'miras' => 'required',
            'p3k' => 'required',
            'makan_sayur' => 'required',
            'sholat' => 'required',
            'baca_quran' => 'required',
            'majelis_taklim' => 'required',
            'pengurus_organisasi' => 'required',
            'status_anak' => 'required',
            'biaya_pendidikan' => 'required',
            'bantuan_lembaga_formal' => 'required',
            'resume' => 'required',
            'petugas_survey' => 'required',
            'kep_kendaraan' => 'required|array',
            'kep_kendaraan.*' => 'in:Sepeda,Motor,Mobil',
        ]);

        DB::table('survey_keluargas')
            ->where('keluarga_id', $id)
            ->update([
                // 'keluarga_id' => $id,
                'kep_tanah' => $request->kep_tanah,
                'kep_rumah' => $request->kep_rumah,
                'lantai' => $request->lantai,
                'dinding' => $request->dinding,
                'kep_kendaraan' => $request->kep_kendaraan,
                'kep_elektronik' => $request->kep_elektronik,
                'sumber_air' => $request->sumber_air,
                'jamban' => $request->jamban,
                'tempat_sampah' => $request->tempat_sampah,
                'perokok' => $request->perokok,
                'miras' => $request->miras,
                'p3k' => $request->p3k,
                'makan_sayur' => $request->makan_sayur,
                'sholat' => $request->sholat,
                'baca_quran' => $request->baca_quran,
                'majelis_taklim' => $request->majelis_taklim,
                'pengurus_organisasi' => $request->pengurus_organisasi,
                'status_anak' => $request->status_anak,
                'biaya_pendidikan' => $request->biaya_pendidikan,
                'bantuan_lembaga_formal' => $request->bantuan_lembaga_formal,
                'resume' => $request->resume,
                'petugas_survey' => $request->petugas_survey,
            ]);

        return redirect()->route('admin.surveyAnak');;
    }
}
