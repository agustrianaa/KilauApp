<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;

class PengajuanAnakController extends Controller
{
    public function pengajuanForm(Request $request) {
        return view('PengajuanAnak.PengajuanAnak');
    }
}
