<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Recipes extends Component
{

    use HelperTrait;


    // :: variables
    public $searchRecipe = '';







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $meals = Meal::where('type', 'Meal')
            ->where('name', 'LIKE', '%' . $this->searchRecipe . '%')
            ->get();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.recipes', compact('meals'));

    } // end function



} // end class



