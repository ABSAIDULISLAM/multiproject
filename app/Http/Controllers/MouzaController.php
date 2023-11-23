<?php

namespace App\Http\Controllers;

use App\Models\Division_list;
use App\Models\Mouza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MouzaController extends Controller
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
        $districts = DB::table('districts')->get();
        return view('backend.mouza.create', compact(['districts']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'district_id'   => 'required',
            'upzila_id'      => 'required',
            'mouza'         => 'required|unique:mouzas,mouza',
        ]);
        Mouza::create($request->all());
        return redirect()->back()->with('success', 'মৌজা সফলভাবে যুক্ত হয়েছে !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mouza $mouza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mouza $mouza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mouza $mouza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mouza $mouza)
    {
        //
    }
}
