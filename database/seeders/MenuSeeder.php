<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MenuSeeder extends Seeder
{

    public function run() : void
    {


        // ::root
        $menus = ['Add-ons', 'Dining Menu', 'Catering Menu', 'Extra Menu (VIP)'];
        $urls = ['addons', 'dining', 'catering', 'extra'];


        for ($i = 0; $i < count($menus); $i++) {
            Menu::create([
                'name' => $menus[$i],
                'nameURL' => $urls[$i],
            ]);
        } // end loop






    } // end function


} // end class
