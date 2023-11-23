<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licence extends Model
{

use HasFactory, SoftDeletes;
protected $guarded = [];

public function licenceholder(){
    return $this->hasMany(Licence_holder::class, 'licence_id');
}

public function kachari(){
   return $this->belongsTo(Kachari::class);
}

public function station(){
    return $this->belongsTo(Station::class);
}

public function licencetype(){
    return $this->belongsTo(LicenceType::class,'licence_type_id');
}

public function district(){
    return $this->belongsTo(District::class,'district_id');
}

public function upzila(){
    return $this->belongsTo(Upzila::class,'upzila_id');
}

public function mouza(){
    return $this->belongsTo(Mouza::class,'mouza_id');
}
// protected static function boot() {
//     parent::boot();

//     static::deleted(function ($query) {
//       $query->AdvertiseAudienceFile()->delete();
//       $query->advertisePlacement()->delete();
//       $query->advertiseLocationFiles()->delete();
//     });
// }

}
