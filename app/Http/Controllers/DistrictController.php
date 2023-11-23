<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kachari;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kacharis = Kachari::all();
        return view('backend.district.create', compact('kacharis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kachari_id' => 'required',
            'name'       => 'required|unique:districts,name',
        ]);
        District::create($request->all());
        return redirect()->back()->with('success', 'জেলা সফলভাবে যুক্ত হয়েছে !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
