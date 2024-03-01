<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $holidays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        for ($i = 0; $i < count($holidays); $i++) {
            Holiday::create([
                'weekday' => $holidays[$i],
            ]);
        } // end loop


    } // end function



} // end seeder
