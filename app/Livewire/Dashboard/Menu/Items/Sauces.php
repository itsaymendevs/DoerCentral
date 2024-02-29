<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Sauces extends Component
{
    use HelperTrait;






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $sauces = Meal::where('type', 'Sauce')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sauces', compact('sauces'));

    } // end function



} // end class

