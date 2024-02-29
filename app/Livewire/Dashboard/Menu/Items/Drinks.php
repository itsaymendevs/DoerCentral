<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Drinks extends Component
{
    use HelperTrait;






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $drinks = Meal::where('type', 'Drink')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.drinks', compact('drinks'));

    } // end function



} // end class


