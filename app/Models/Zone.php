<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;


    public function districts()
    {
        return $this->hasMany(ZoneDistrict::class, 'zoneId');

    } // end function





} // end model
