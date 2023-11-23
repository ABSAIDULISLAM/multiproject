<?php

namespace App\Http\Controllers;

use App\Models\Kachari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function thanaInfo(Request $request)
    {
        $thanas = DB::table('upzilas')
            ->where('district_id', $request->district_id)
            ->get();

        if (count($thanas) > 0) {
            return response()->json($thanas);
        }
    }

    public function unionInfo(Request $request)
    {
        $union = DB::table('union_list')
            ->where('thana_id', $request->union_id)
            ->get();

        if (count($union) > 0) {
            return response()->json($union);
        }
    }


    public function mouzaInfo(Request $request)
    {
        $union = DB::table('mouzas')
            ->where('id', $request->thana_id)
            ->get();

        if (count($union) > 0) {
            return response()->json($union);
        }
    }

    // kachari Id for show kacharo no.
    public function kachariInfo(Request $request)
    {
        $union = DB::table('kacharis')
            ->where('id', $request->kachariId)
            ->get();

        if (count($union) > 0) {
            return response()->json($union);
        }
    }



    public function stationInfo(Request $request)
    {
        $station = DB::table('stations')
            ->where('kachari_id', $request->kachari_id)
            ->get();
            // $union = Kachari::find($request->id)->first();

        if (count($station) > 0) {
            return response()->json($station);
        }
    }


    public function stationnumberInfo(Request $request)
    {
        $stationnumber = DB::table('stations')
            ->where('id', $request->stationId)
            ->get();
            // $union = Kachari::find($request->id)->first();

        if (count($stationnumber) > 0) {
            return response()->json($stationnumber);
        }
    }

    public function licencetypeInfo(Request $request)
    {

        $licencetypeNumber = DB::table('licence_types')
            ->where('id', $request->licencetype)
            ->get();
            return response()->json($licencetypeNumber);
            // if ($licencetypeNumber->id == 1){

            //    $licencetypeNumber = $this->$licencetypeNumber->licence_type_serial = 9001;
            //    return response()->json($licencetypeNumber);

            // }elseif ($licencetypeNumber->id == 2) {

            //     $licencetypeNumber = $this->$licencetypeNumber->licence_type_serial = 8001;
            //     return response()->json($licencetypeNumber);

            // }elseif ($licencetypeNumber->id == 3) {

            //     $licencetypeNumber = $this->$licencetypeNumber->licence_type_serial = 7001;
            //     return response()->json($licencetypeNumber);

            // }elseif ($licencetypeNumber->id == 4) {

            //     $licencetypeNumber = $this->$licencetypeNumber->licence_type_serial = 6001;
            //     return response()->json($licencetypeNumber);
            // }

        // if (count($licencetypeNumber) > 0) {
        //     return response()->json($licencetypeNumber);
        // }

    }


    public function lctoslInfo(Request $request)
    {
        $licencetypeSerial = DB::table('licence_types')
            ->where('id', $request->lctosl)
            ->get();
        if(count($licencetypeSerial) > 0){
            if($licencetypeSerial->id == 1){
                $lctsl = "90001";
                return response()->json($lctsl);
            }elseif($licencetypeSerial->id == 2){
                $lctsl = "80001";
                return response()->json($lctsl);
            }elseif($licencetypeSerial->id == 3){
                $lctsl = "70001";
                return response()->json($lctsl);
            }elseif($licencetypeSerial->id == 4){
                $lctsl = "60001";
                return response()->json($lctsl);
            }
        }
    }


    // public function lctoslInfo(Request $request)
    // {
    //     $licencetypeNumber = DB::table('licence_types')
    //         ->where('id', $request->lctosl)
    //         ->get();

    //         if($licencetypeNumber){
    //             $tlt = 00001;
    //             return response()->json($licencetypeNumber);
    //         }

    // }







}
