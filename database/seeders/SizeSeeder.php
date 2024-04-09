<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SizeSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $sizes = Storage::disk('public')->get("sources/Sizes.json");
        $sizes = $sizes ? json_decode($sizes, true) : [];




        for ($i = 0; $i < count($sizes); $i++) {
            Size::create([
                'name' => $sizes[$i]['name'],
                'shortName' => $sizes[$i]['shortName'],
                'price' => $sizes[$i]['price'] ?? 0,
                'calories' => $sizes[$i]['calories'] ?? 0,
            ]);
        } // end loop



    } // end function



} // end seeder



