<?php

namespace Database\Seeders;

use App\Models\ColorPalette;
use App\Traits\HelperTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ColorSeeder extends Seeder
{

    use HelperTrait;


    public function run() : void
    {


        // ::root
        $palettes = Storage::disk('public')->get('sources/Palettes.json');
        $palettes = json_decode($palettes, true);


        for ($i = 0; $i < count($palettes); $i++) {
            ColorPalette::create([
                'name' => $palettes[$i]['name'],
                'value' => $palettes[$i]['value'],
                'secondValue' => $palettes[$i]['secondValue'],
            ]);
        } // end loop


    } // end function



} // end seeder


