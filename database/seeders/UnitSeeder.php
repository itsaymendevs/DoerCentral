<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $units = ['Gram', 'mL'];

        for ($i = 0; $i < count($units); $i++) {
            Unit::create([
                'name' => $units[$i],
            ]);
        } // end loop


    } // end function



} // end seeder
