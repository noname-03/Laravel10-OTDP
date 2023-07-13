<?php

namespace App\Http\Controllers;

use App\Models\Otdp;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HasilController extends Controller
{
    public function index(Request $request)
    {
        $data_otdps = Otdp::query();

        if ($request->has('month')) {
            $month = $request->month;
            $data_otdps->whereMonth('created_at', $month);
        }

        if ($request->has('week')) {
            $week = $request->week;
            $year = Carbon::now()->year;

            if (empty($week)) {
                $week = Carbon::now()->week;
            }

            $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek();

            $data_otdps->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($request->has('year')) {
            $year = $request->year;
            $data_otdps->whereYear('created_at', $year);
        }

        $data_otdps = $data_otdps->get();

        return view('pages.hasil.index', compact('data_otdps'));
    }
}