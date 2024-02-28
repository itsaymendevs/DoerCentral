<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $cities = Storage::disk('public')->get('sources/Cities.json');
        $cities = json_decode($cities, true);


        for ($i = 0; $i < count($cities); $i++) {
            City::create([
                'name' => $cities[$i]['name'],
            ]);
        } // end loop


    } // end function



} // end seeder


