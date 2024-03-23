<?php

namespace Database\Seeders;

use App\Models\Diet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DietSeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $diets = Storage::disk('public')->get('sources/Diets.json');
        $diets = json_decode($diets, true);


        for ($i = 0; $i < count($diets); $i++) {
            Diet::create([
                'name' => $diets[$i]['name'],
                'desc' => $diets[$i]['description'],
            ]);
        } // end loop



    } // end function



} // end seeder



