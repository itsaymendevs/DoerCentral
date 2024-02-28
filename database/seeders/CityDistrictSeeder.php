<?php

namespace Database\Seeders;

use App\Models\CityDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CityDistrictSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $districts = Storage::disk('public')->get('sources/Districts.json');
        $districts = json_decode($districts, true);


        for ($i = 0; $i < count($districts); $i++) {
            CityDistrict::create([
                'name' => $districts[$i]['name'],
                'cityId' => $districts[$i]['cityId'],
            ]);
        } // end loop




    } // end function



} // end seeder



