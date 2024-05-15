<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UnitSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $units = Storage::disk('public')->get('sources/Units.json');
        $units = json_decode($units, true);


        for ($i = 0; $i < count($units); $i++) {
            Unit::create([
                'name' => $units[$i]['name'],
                'isForPurchase' => $units[$i]['isForPurchase'],
                'toGram' => $units[$i]['toGram'],
                'toML' => $units[$i]['toML'],
                'toPiece' => $units[$i]['toPiece'],

            ]);
        } // end loop




    } // end function



} // end seeder
