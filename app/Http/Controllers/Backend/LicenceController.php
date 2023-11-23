<?php

namespace App\Http\Controllers\Backend;

use app\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;
use App\Models\District;
use App\Models\Kachari;
use App\Models\Licence;
use App\Models\Licence_holder;
use App\Models\LicenceType;
use App\Models\Station;
use App\Services\LicenceStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('backend.licence.search-licence');
    }

    public function licenceAdd()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kacharis = Kachari::all();
        $stations = Station::all();
        $licenceTypes = LicenceType::all();
        $districts = District::all();

        // return $station;
        return view('backend.licence.licence-add', compact([
            'kacharis',
            'stations',
            'licenceTypes',
            'districts',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLicenceRequest $request)
    {
        $validatData = $request->validated();
        $result = LicenceStoreService::create($validatData);
        return redirect()->back()->with('success', '<h6 style="color:green;">Licence Created Successfully !!</h6>');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenceRequest $request, $licence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $licence)
    {
        //
    }

    public function licenceSearchByLicenceNumber(Request $request){
        $request->validate(['licence_number' => 'required']);

        $licences = Licence::where('licence_no', $request->licence_number)->with(['licenceholder', 'kachari', 'station', 'licencetype', 'district', 'upzila', 'mouza'])->get();


        if(!count($licences) > 0){
            return redirect()->back()->with('error', 'লাইসেন্স নাম্বারটি খুজে পাওয়া যায়নি !! ‍সঠিক লাইসেন্স দিন ।');
        }else{
            // return $licences;
            return view('backend.licence.licenceview-bylicence', compact('licences'));
        }
    }
}

