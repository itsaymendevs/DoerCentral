<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $sizes = ['Item Size'];
        $shortSizes = ['IS'];


        for ($i = 0; $i < count($sizes); $i++) {
            Size::create([
                'name' => $sizes[$i],
                'shortName' => $shortSizes[$i],
                'price' => 0,
                'calories' => 0,
            ]);
        } // end loop



    } // end function



} // end seeder



