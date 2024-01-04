<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\anak;
use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\StatusAnak;
use App\Models\SurveyKeluarga;
use App\Models\Wali;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ValidasiSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
            $no_kk = $request->no_kk;
            $kepala_keluarga = $request->kepala_keluarga;
            $petugas_survey = $request->petugas_survey;
            $created_at = $request->created_at;
            $hsurvey = $request->hsurvey;


            $data = DataKeluarga::
            select(
                'survey_keluargas.id as id',
                'data_keluargas.no_kk as no_kk',
                'data_keluargas.kepala_keluarga as kepala_keluarga',
                'survey_keluargas.petugas_survey as petugas_survey',
                'survey_keluargas.created_at as created_at',
                'survey_keluargas.*',
            )
            ->join('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->when(isset($no_kk), function ($query) use ($no_kk) {
                $query->where('data_keluargas.no_kk', 'like', '%' . $no_kk . '%');
            })
            ->when(isset($kepala_keluarga), function ($query) use ($kepala_keluarga) {
                    $query->where('data_keluargas.kepala_keluarga', 'like', '%' . $kepala_keluarga . '%');
            })
            ->when(isset($petugas_survey), function ($query) use ($petugas_survey) {
                    $query->where('survey_keluargas.petugas_survey', 'like', '%' . $petugas_survey . '%');
            })
            ->when(isset($created_at), function ($query) use ($created_at) {
                $query->where(function ($subQuery) use ($created_at) {
                    $subQuery->orWhereRaw('DAY(survey_keluargas.created_at) LIKE ?', ["%$created_at%"])
                                ->orWhereRaw('MONTHNAME(survey_keluargas.created_at) LIKE ?', ["%$created_at%"])
                                ->orWhereRaw('YEAR(survey_keluargas.created_at) LIKE ?', ["%$created_at%"])
                                ->orWhereRaw("DATE_FORMAT(survey_keluargas.created_at, '%e %M %Y') LIKE ?", ["%$created_at%"])
                                ->orWhereRaw("DATE_FORMAT(survey_keluargas.created_at, '%M %Y') LIKE ?", ["%$created_at%"]);
                });
            })
            ->when(isset($hsurvey), function ($query) use ($hsurvey) {
                $query->where('survey_keluargas.hsurvey', 'like', '%' . $hsurvey . '%');
            })
            ->get();

            return datatables($data)
            ->addColumn('action', function($row){
                $id = $row->id; // Ambil ID dari baris data
                $validAct = ' <a href="javascript:void(0)" onClick="editFunc(' . $id . ')" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $validAct .= ' <a href="javascript:void(0)" onClick="deleteFunc(' . $id . ')" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $validAct;
            })
            ->addColumn('kelayakan', function($row){
                $id = $row->id; // Ambil ID dari baris data
                $survey = SurveyKeluarga::find($id);
                $data = $survey->hsurvey;
                if ($data === null) {
                    $kelayakanAct = '<a href="javascript:void(0)" onClick="tambahKelayakan('. $id .')" data-original-title="Tambahkan Kelayakan" class="tambahkan-kelayakan btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Tambahkan Kelayakan</a>';
                } else {
                    $kelayakanAct = '<a href="javascript:void(0)" onClick="kelayakanFunc(' . $id . ')" data-original-title="View Kelayakan" class="kelayakan btn btn-info btn-sm"><i class="fas fa-check-circle"></i> Layak</a>';
                }
                return $kelayakanAct;
            })
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->isoFormat('D MMMM YYYY');
            })
            ->rawColumns(['action', 'kelayakan'])
            ->addIndexColumn()
            ->make(true);

        }
        return view('validasiSurvey.validasi-table');
    }

    public function validation(Request $request, $id)
    {
        $validasi = SurveyKeluarga::find($id);
        $dataKeluarga = DataKeluarga::find($id);
        $dataAyah = Ayah::where('data_keluarga_id', $id)->first();
        $dataIbu = Ibu::where('data_keluarga_id', $id)->first();
        $dataWali = Wali::where('data_keluarga_id', $id)->first();

        $status = $validasi->hsurvey;
        $ket = $validasi->resume;

        return view('validasiSurvey.validasi-survey', compact('id', 'validasi', 'dataKeluarga', 'dataIbu', 'dataAyah', 'dataWali', 'status', 'ket'));

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
    public function store(Request $request, $id)
    {
        $survey = SurveyKeluarga::find($id);
        $status = $request->input('status');
        $ket = $request->input('ket');


        SurveyKeluarga::create([
            'resume' => $ket,
            'hsurvey' => $status,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
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
    public function update(Request $request, $id)
{
    $survey = SurveyKeluarga::find($id);

    if (!$survey) {
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    $status = $request->input('status');
    $ket = $request->input('ket');
    $id_kel = $survey->keluarga_id;
    // Menggunakan metode update untuk memperbarui record yang sudah ada
    $survey->update([
        'resume' => $ket,
        'hsurvey' => $status,
    ]);

    if($status != 'Ditangguhkan'){
        $stat = $status == 'layak' ? 'CPB' : 'NPB';
        StatusAnak::whereIn('anak_id', function($query) use($id_kel){
                                $query->select('id_anaks')
                                    ->from('anaks')
                                    ->where('data_keluarga_id', $id_kel);
                            })
                            ->update(['status_beasiswa' => $stat, 'status_binaan' => true]);
    }

    return Redirect::route('admin.validasi-survey')->with('success', 'Data berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $survey = SurveyKeluarga::where('id',$request->id)->delete();

        return Response()->json($survey);
    }

}
