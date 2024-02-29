<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Cuisine;
use App\Models\Diet;
use App\Models\MealType;
use App\Models\Tag;
use Livewire\Component;

class Builder extends Component
{




    public function render()
    {



        return view('livewire.dashboard.menu.builder', compact('types', 'cuisines', 'diets', 'tags'));


    } // end function



} // end class
