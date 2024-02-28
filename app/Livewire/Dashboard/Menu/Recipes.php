<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Recipes extends Component
{

    use HelperTrait;









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $meals = Meal::where('type', 'Meal')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.recipes', compact('meals'));

    } // end function



} // end class



