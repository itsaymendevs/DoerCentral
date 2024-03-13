<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityHoliday;
use App\Models\Holiday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $cities = City::all();
        $holidays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];


        foreach ($cities as $city) {

            for ($i = 0; $i < count($holidays); $i++) {

                CityHoliday::create([
                    'weekday' => $holidays[$i],
                    'cityId' => $city->id,
                ]);

            } // end loop

        } // end loop



    } // end function



} // end seeder
