<?php

namespace Database\Seeders;

use App\Models\IngredientCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class IngredientCategorySeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $categories = Storage::disk('public')->get('sources/IngredientCategories.json');
        $categories = json_decode($categories, true);


        for ($i = 0; $i < count($categories); $i++) {
            IngredientCategory::create([
                'name' => $categories[$i]['name'],
                'desc' => 'Dummy Description',
            ]);
        } // end loop


    } // end function



} // end seeder
