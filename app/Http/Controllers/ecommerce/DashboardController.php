<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Kachari;
use App\Models\Mouza;
use App\Models\Station;
use App\Models\Upzila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $counts = DB::table('licences')
        ->select('licence_type_id', DB::raw('COUNT(*) as count'))
        ->groupBy('licence_type_id')
        ->get();

        $districts = District::sum('id');
        $upzila = Upzila::sum('id');
        $station = Station::sum('id');
        $kachri = Kachari::sum('id');
        $mouza = Mouza::sum('id');

        return view('ecommerce.dashboard', compact(['counts', 'districts', 'upzila', 'station', 'kachri', 'mouza']));

    }
}
