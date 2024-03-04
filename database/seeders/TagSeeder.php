<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run() : void
    {

        // ::root
        $tags = ['Gluten Free', 'Contain Wheat', 'Contain Milk'];

        for ($i = 0; $i < count($tags); $i++) {
            Tag::create([
                'name' => $tags[$i],
            ]);
        } // end loop


    } // end function



} // end seeder
