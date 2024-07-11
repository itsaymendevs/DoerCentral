<?php

namespace App\Livewire\Dashboard\Menu\Lists\Components;

use App\Models\Menu;
use App\Traits\HelperTrait;
use Livewire\Component;

class SubMenu extends Component
{


    use HelperTrait;



    public function render()
    {


        // 1: dependencies
        $menus = Menu::all();


        return view('livewire.dashboard.menu.lists.components.sub-menu', compact('menus'));


    } // end function






} // end class
