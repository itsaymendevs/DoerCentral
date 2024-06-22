<?php

namespace Database\Seeders;

use App\Models\ServingItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServingItemSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        ServingItem::create([
            'cutleryPrice' => 0,
        ]);


    } // end function



} // end seeder

