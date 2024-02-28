<?php

namespace Database\Seeders;

use App\Models\ShiftType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftTypeSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $shiftTypes = ['Morning Shift', 'Evening Shift'];
        $shiftFrom = ['09:00', '16:00'];
        $shiftUntil = ['16:00', '02:00'];




        for ($i = 0; $i < count($shiftTypes); $i++) {
            ShiftType::create([
                'name' => $shiftTypes[$i],
                'shiftFrom' => $shiftFrom[$i],
                'shiftUntil' => $shiftUntil[$i],
            ]);
        } // end loop


    } // end function



} // end seeder
