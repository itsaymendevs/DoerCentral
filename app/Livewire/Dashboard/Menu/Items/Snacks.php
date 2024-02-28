<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Snacks extends Component
{

    use HelperTrait;






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $snacks = Meal::where('type', 'Snack')->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.snacks', compact('snacks'));

    } // end function



} // end class

