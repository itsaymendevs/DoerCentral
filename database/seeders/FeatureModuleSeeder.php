<?php

namespace Database\Seeders;

use App\Models\FeatureModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FeatureModuleSeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $featureModules = Storage::disk('public')->get('sources/FeatureModules.json');
        $featureModules = json_decode($featureModules, true);


        for ($i = 0; $i < count($featureModules); $i++) {

            FeatureModule::create([
                'name' => $featureModules[$i]['name'],
                'nameURL' => $featureModules[$i]['nameURL'],
            ]);
        } // end loop





    } // end function



} // end seeder
