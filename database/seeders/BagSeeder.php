<?php

namespace Database\Seeders;

use App\Models\Bag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $bags = ['Cool Bag', 'Paper Bag'];
        $bagImages = ['coolBag.png', 'paperBag.png'];
        $bagPrices = [200, 0];



        for ($i = 0; $i < count($bags); $i++) {
            Bag::create([
                'name' => $bags[$i],
                'imageFile' => $bagImages[$i],
                'price' => $bagPrices[$i],
            ]);
        } // end loop


    } // end function



} // end seeder

