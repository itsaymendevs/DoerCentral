<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Sides extends Component
{
    use HelperTrait;


    // :: variables
    public $searchSide = '';






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Side')->first();

        $sides = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSide . '%')
            ->get();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sides', compact('sides'));

    } // end function



} // end class
