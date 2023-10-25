<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Anak;
use App\Models\DataKeluarga;

class HomeController extends Controller
{

    public function welcome_page(){
        return view('page.welcomePage');
    }

    public function dashboard()
{
    // Hitung jumlah total data tabel
    $totalCalonAnakBinaan = DataKeluarga::select(
        'data_keluargas.*',
        'ayahs.*',
        'anaks.*',
        'ibus.*', 
        'walis.*',
        'status_anaks.*',
        )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
        ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        ->where('status_anaks.status_binaan', 0)
        ->count();

    $totalAnakBinaan = DataKeluarga::select(
        'data_keluargas.*',
        'ayahs.*',
        'anaks.*',
        'ibus.*', 
        'walis.*',
        'status_anaks.*',
        )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
        ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        ->where('status_anaks.status_binaan', 1)
        ->count();

    $totalBelumValidasi = DataKeluarga::select(
        'data_keluargas.*',
        'ayahs.*',
        'anaks.*',
        'ibus.*', 
        'walis.*',
        'status_anaks.*',
        )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
        ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        ->where('status_anaks.status_beasiswa', 'Belum Validasi')
        ->count();

    $totalSudahValidasi = DataKeluarga::select(
        'data_keluargas.*',
        'ayahs.*',
        'anaks.*',
        'ibus.*', 
        'walis.*',
        'status_anaks.*',
        )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
        ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        ->where('status_anaks.status_beasiswa', '!=' , 'Belum Validasi')
        ->count();

    if (auth()->user()->role == 'admin' || auth()->user()->role == 'adminpusat' || auth()->user()->role == 'admincabang' || auth()->user()->role == 'shelter' || auth()->user()->role == 'donatur' || auth()->user()->role == 'orangtua') {
        return view('dashboard', compact('totalAnakBinaan', 'totalCalonAnakBinaan', 'totalBelumValidasi', 'totalSudahValidasi'));
    } else {
        return view('dashboard'); // Tambahkan logika lain jika diperlukan
    }
}

    
    public function menu(){
        return view('page.menu');
    }

    public function index(){
        $data = User::get();
        return view('index',compact('data'));
    }

    public function create(){
        return view('create');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'role' => 'Role wajib dipilih',
            'password' => 'Password wajib diisi',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->name;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('index');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('edit',compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'role' => 'Role wajib dipilih',
            'password' => 'Password wajib diisi',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('index');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }

    public function a() {
        return view('survey.a');
    }
}
