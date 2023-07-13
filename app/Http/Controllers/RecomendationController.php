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
}