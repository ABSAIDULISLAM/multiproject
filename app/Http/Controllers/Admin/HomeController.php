<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Kachari;
use App\Models\Licence;
use App\Models\Mouza;
use App\Models\Station;
use App\Models\Upzila;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
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

        return view('admin.index', compact(['counts', 'districts', 'upzila', 'station', 'kachri', 'mouza']));
    }
}
