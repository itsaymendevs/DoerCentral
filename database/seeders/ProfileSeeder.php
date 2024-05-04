<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProfileSeeder extends Seeder
{



    public function run() : void
    {


        // ::root
        $profiles = Storage::disk('public')->get('sources/Profiles.json');
        $profiles = json_decode($profiles, true);



        for ($i = 0; $i < count($profiles); $i++) {
            Profile::create([
                'name' => $profiles[$i]['name'],
                'imageFile' => $profiles[$i]['imageFile'],
                'clientURL' => $profiles[$i]['clientURL'],
                'serverURL' => $profiles[$i]['serverURL'],
                'websiteURL' => $profiles[$i]['websiteURL'],
                'applicationURL' => $profiles[$i]['applicationURL'],
            ]);
        } // end loop


    } // end function



} // end seeder
