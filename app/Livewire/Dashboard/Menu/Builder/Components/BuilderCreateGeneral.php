<?php

namespace App\Livewire\Dashboard\Menu\Builder\Components;

use App\Models\Cuisine;
use App\Models\Diet;
use App\Models\Tag;
use Livewire\Component;

class BuilderCreateGeneral extends Component
{
    public function render()
    {


        // 1: dependencies
        $types = ['Meal', 'SubRecipe', 'Snack', 'Side', 'Sauce', 'Drink'];
        $cuisines = Cuisine::all();
        $diets = Diet::all();
        $tags = Tag::all();


        return view('livewire.dashboard.menu.builder.components.builder-create-general', compact('types', 'cuisines', 'diets', 'tags'));


    } // end function




} // end class
