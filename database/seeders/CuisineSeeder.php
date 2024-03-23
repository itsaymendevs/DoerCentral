<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CuisineSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $cuisines = Storage::disk('public')->get('sources/Cuisines.json');
        $cuisines = json_decode($cuisines, true);


        for ($i = 0; $i < count($cuisines); $i++) {
            Cuisine::create([
                'name' => $cuisines[$i]['name'],
            ]);
        } // end loop



    } // end function



} // end seeder
