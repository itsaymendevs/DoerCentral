<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Sides extends Component
{
    use HelperTrait;






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $sides = Meal::where('type', 'Side')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sides', compact('sides'));

    } // end function



} // end class
