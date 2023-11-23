<?php

namespace App\Http\Controllers;

use App\Models\LicenceType;
use App\Http\Requests\StoreLicenceTypeRequest;
use App\Http\Requests\UpdateLicenceTypeRequest;

class LicenceTypeController extends Controller
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
        $Kachari =  LicenceType::all()->first();
        if($Kachari){
            $kachari = LicenceType::orderBy('licence_type_number', 'desc')->first();
            $kacharitwo = LicenceType::orderBy('licence_type_serial', 'desc')->first();
            $serial = $kachari->licence_type_number + 1;
            $serialtwo = $kacharitwo->licence_type_serial + 1;
            return view('backend.licence-type.create', compact(['serial', 'serialtwo']));
        }else{
            $serial = '1';
            $serialtwo = "1";

            return view('backend.licence-type.create', compact(['serial', 'serialtwo']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLicenceTypeRequest $request)
    {
        // return $request->all();
        $request->validate([
            'licence_type_number'  => 'required|unique:licence_types,licence_type_number',
            'name'                 => 'required|unique:licence_types,name',
        ]);
        LicenceType::create($request->all());
        return redirect()->back()->with('success', 'Licence type Created Successfully !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LicenceType $licenceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LicenceType $licenceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenceTypeRequest $request, LicenceType $licenceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LicenceType $licenceType)
    {
        //
    }
}
