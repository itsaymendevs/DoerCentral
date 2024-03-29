<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TagSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $tags = Storage::disk('public')->get('sources/Tags.json');
        $tags = json_decode($tags, true);


        for ($i = 0; $i < count($tags); $i++) {
            Tag::create([
                'name' => $tags[$i]['name'],
                'imageFile' => $tags[$i]['imageFile'],
            ]);
        } // end loop



    } // end function







} // end seeder
