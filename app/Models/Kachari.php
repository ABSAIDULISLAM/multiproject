<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kachari extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function licence(){
        return $this->hasMany(Licence::class, 'kachari_id');
    }
}
