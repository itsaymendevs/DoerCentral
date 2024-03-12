<?php

namespace Database\Seeders;

use App\Models\IngredientGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class IngredientGroupSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $groups = Storage::disk('public')->get('sources/IngredientGroups.json');
        $groups = json_decode($groups, true);


        for ($i = 0; $i < count($groups); $i++) {
            IngredientGroup::create([
                'name' => $groups[$i]['name'],
                'desc' => 'Dummy Description',
            ]);
        } // end loop


    } // end function



} // end seeder



