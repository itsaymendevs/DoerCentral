<?php

namespace App\Livewire\Home\Components;

use Livewire\Component;
use stdClass;

class HomeFeatures extends Component
{
    public function render()
    {

        // 1: features
        $features = [];


        // 1.2: menu
        $features[0]['name'] = 'Menu Management';
        $features[0]['description'] = "A menu management system dashboard usually includes tools for creating, editing, and organizing menus. It allows users to design menus by adding or removing dishes, categorizing them by meal type, and setting pricing for each item. The system often integrates inventory management to track ingredient availability and prevent shortages. It can provide analytics on popular dishes and sales performance, and may include options for special menus. Additionally, there’s functionality for scheduling when certain menus are active or available.";

        $features[0]['imageFile'] = 'menu.png';






        // 1.3: menu
        $features[1]['name'] = 'Menu Management';
        $features[1]['description'] = "A menu management system dashboard usually includes tools for creating, editing, and organizing menus. It allows users to design menus by adding or removing dishes, categorizing them by meal type, and setting pricing for each item. The system often integrates inventory management to track ingredient availability and prevent shortages. It can provide analytics on popular dishes and sales performance, and may include options for special menus. Additionally, there’s functionality for scheduling when certain menus are active or available.";

        $features[1]['imageFile'] = 'menu.png';







        return view('livewire.home.components.home-features', compact('features'));


    } // end function


} // end class
