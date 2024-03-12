<?php

namespace Database\Seeders;

use App\Models\Exclude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExcludeSeeder extends Seeder
{


    public function run() : void
    {


        // ::root
        $excludes = Storage::disk('public')->get('sources/Excludes.json');
        $excludes = json_decode($excludes, true);


        for ($i = 0; $i < count($excludes); $i++) {
            Exclude::create([
                'name' => $excludes[$i]['name'],
                'desc' => 'Dummy Description',
            ]);
        } // end loop


    } // end function



} // end seeder


