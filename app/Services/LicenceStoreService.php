<?php

namespace App\Services;

use app\Helpers\Helper;
use App\Models\Licence;
use App\Models\Licence_holder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LicenceStoreService{

    public static function create($validatData)
    {
    //    return request()->hasFile('image');

        $userId = Auth::user()->id;
        $licence = new Licence();
        $licence->kachari_id       = $validatData['kachari_id'];
        $licence->station_id       = $validatData['station_id'];
        $licence->licence_type_id  = $validatData['licence_type_id'];
        $licence->user_id          = $userId;
        $licence->plot_no          = $validatData['plot_no'];
        $licence->jl_no            = $validatData['jl_no'];
        $licence->dag_no           = $validatData['dag_no'];
        $licence->district_id      = $validatData['district_id'];
        $licence->upzila_id        = $validatData['upzila_id'];
        $licence->mouza_id         = $validatData['mouza_id'];
        $licence->licence_no       = $validatData['licence_no'];
        $licence->land_height      = $validatData['land_height'];
        $licence->land_width       = $validatData['land_width'];
        $licence->land_total       = $validatData['land_total'];
        $licence->validity         = $validatData['validity'];
        $licence->south            = $validatData['south'];
        $licence->north            = $validatData['north'];
        $licence->east             = $validatData['east'];
        $licence->west             = $validatData['west'];
        $licence->save();

        // $type = gettype($validatData['licence_type_id']);
        // if($type === 'integer' ){
            DB::table('licence_types')->where('id', $validatData['licence_type_id'])->update(['licence_type_serial' => $validatData['licence_no']]);
        // }


        if($validatData['licence_holder']){
            foreach ($validatData['licence_holder'] as $key => $lcholderName ) {
               $licenceHolder                 = new Licence_holder();
               $licenceHolder->licence_id     = $licence->id;
               $licenceHolder->licence_holder = $lcholderName;
               $licenceHolder->father_name    = $validatData['father_name'][$key];
               $licenceHolder->address        = $validatData['address'][$key];
               $licenceHolder->nid            = $validatData['nid'][$key];
               $licenceHolder->date_of_birth  = $validatData['date_of_birth'][$key];
               $licenceHolder->mobile         = $validatData['mobile'][$key];

               if($file = request()->hasFile('image')){
                    $licenceHolder->image = 'n/a';
                    // $image = upload_image($file, 'uploads/licence_holders', 200, 220);
                    // $licenceHolder->image = $image[$key];
               }else{
                    $licenceHolder->image = 'n/a';
                }
               $licenceHolder->save();
            }
        }
        // return true;
    }


}
