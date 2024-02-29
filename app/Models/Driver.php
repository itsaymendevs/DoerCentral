<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;


    public function zones()
    {

        return $this->hasMany(DriverZone::class, 'driverId');

    } // end function





} // end model
