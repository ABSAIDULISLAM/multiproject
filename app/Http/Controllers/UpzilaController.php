<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upzila;
use Illuminate\Http\Request;

class UpzilaController extends Controller
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
        $districts = District::all();
        return view('backend.upzila.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'name'        => 'required|unique:upzilas,name',
        ]);
        Upzila::create($request->all());
        return redirect()->back()->with('success', 'উপজেলা সফলভাবে যুক্ত হয়েছে !!');
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
