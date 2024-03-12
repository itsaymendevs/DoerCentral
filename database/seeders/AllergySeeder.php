<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AllergySeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $allergies = Storage::disk('public')->get('sources/Allergies.json');
        $allergies = json_decode($allergies, true);


        for ($i = 0; $i < count($allergies); $i++) {
            Allergy::create([
                'name' => $allergies[$i]['name'],
                'desc' => 'Dummy Description',
            ]);
        } // end loop


    } // end function



} // end seeder




