<?php

namespace Database\Seeders;

use App\Models\CountryCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountryCodeSeeder extends Seeder
{


   public function run() : void
   {


      // ::root
      $countryCodes = Storage::disk('public')->get('sources/CountryCodes.json');
      $countryCodes = json_decode($countryCodes, true);


      for ($i = 0; $i < count($countryCodes); $i++) {
         CountryCode::create([
            'name' => $countryCodes[$i]['name'],
            'code' => $countryCodes[$i]['key'],
         ]);
      } // end loop


   } // end function



} // end seeder

