<?php

namespace Database\Seeders;

use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{


    public function run() : void
    {

        // ::root
        Social::create([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


    } // end function



} // end seeder



