<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeatureModule;
use App\Traits\HelperTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FeatureSeeder extends Seeder
{

    use HelperTrait;


    public function run() : void
    {


        // ::root
        $features = Storage::disk('public')->get('sources/Features.json');
        $features = json_decode($features, true);


        for ($i = 0; $i < count($features); $i++) {

            // 1.2: getModule
            $module = FeatureModule::where('nameURL', 'LIKE', '%' . $features[$i]['featureModule'] . '%')->first();

            Feature::create([
                'name' => $features[$i]['name'],
                'nameURL' => $features[$i]['nameURL'],
                'featureModuleId' => $module->id,
            ]);

        } // end loop





    } // end function



} // end seeder



