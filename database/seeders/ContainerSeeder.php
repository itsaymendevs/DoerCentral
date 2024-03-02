<?php

namespace Database\Seeders;

use App\Models\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ContainerSeeder extends Seeder
{
    public function run() : void
    {


        // ::root
        $containers = Storage::disk('public')->get('sources/Containers.json');
        $containers = json_decode($containers, true);


        for ($i = 0; $i < count($containers); $i++) {
            Container::create([
                'name' => $containers[$i]['name'],
                'imageFile' => $containers[$i]['imageFile'],
            ]);
        } // end loop


    } // end function



} // end seeder

