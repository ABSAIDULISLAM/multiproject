<?php

namespace App\Http\Controllers;

use App\Models\Kachari;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $Kachari =  Station::all()->first();
        if($Kachari){
            $stations = Station::orderBy('staion_serial', 'desc')->first();
            $serial = $stations->staion_serial + 1;
            $kacharies = Kachari::all();
            return view('backend.station.create', compact(['serial', 'kacharies']));
        }else{
            $serial = '10';
            $kacharies = Kachari::all();
            return view('backend.station.create', compact(['serial', 'kacharies']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'staion_serial' => 'required|unique:stations,staion_serial',
            'kachari_id'    => 'required',
            'name'          => 'required|unique:stations,name',
        ]);
        Station::create($request->all());
         return redirect()->back()->with('success', 'Station Created Successfully !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        //
    }
}
