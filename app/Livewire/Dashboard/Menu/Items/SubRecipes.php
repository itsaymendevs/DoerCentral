<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SubRecipes extends Component
{


    use HelperTrait;









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $subRecipes = Meal::where('type', 'SubRecipe')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sub-recipes', compact('subRecipes'));

    } // end function



} // end class

