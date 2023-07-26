<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otdp;

class RecomendationController extends Controller
{
    public function index()
    {
        $data_otdps = Otdp::latest()->get();
        return view('pages.recomendation.index', compact('data_otdps'));
    }
    public function cetakSurat($id){
        $data_otdp = Otdp::findOrFail($id);
        // dd($data_otdp);
        return view('pages.recomendation.cetak_surat', compact('data_otdp'));

}
}
