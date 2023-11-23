<?php

namespace App\Http\Controllers;

use App\Models\Kachari;
use Illuminate\Http\Request;

class KachariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'ok';
        $kacharies = Kachari::all();
        return $kacharies;
        return view('backend.kachari.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Kachari =  Kachari::all()->first();
        if($Kachari){
            $kachari = Kachari::orderBy('kachari_serial', 'desc')->first();
            $serial = $kachari->kachari_serial + 1;
            return view('backend.kachari.create', compact('serial'));
        }else{
            $serial = '10';
            return view('backend.kachari.create', compact('serial'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kachari_serial'     => 'required|unique:kacharis,kachari_serial',
            'name'              => 'required|unique:kacharis,name',
        ]);
         Kachari::create($request->all());
         return redirect()->back()->with('success', 'Kachari Created Successfully !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kachari $kachari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kachari $kachari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kachari $kachari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kachari $kachari)
    {
        //
    }
}
