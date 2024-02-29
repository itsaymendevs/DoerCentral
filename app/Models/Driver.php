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




    public function zonesInArray()
    {


        // 1: getZones - loop
        $zonesInArray = [];

        $driverZones = $this->zones()->get();

        foreach ($driverZones as $driverZone) {
            array_push($zonesInArray, $driverZone->zone->name);
        }


        return $zonesInArray ? $zonesInArray : ['Not Assigned'];


    } // end function








    public function zonesForTooltips()
    {


        // 1: getZones - convertToString
        $driverZones = $this->zonesInArray();
        $driverZones = implode('<br />', $driverZones);

        return $driverZones;


    } // end function






} // end model
