<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Snacks extends Component
{

    use HelperTrait;


    // :: variables
    public $searchSnack = '';







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Snack')->first();

        $sauces = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSnack . '%')
            ->get();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.snacks', compact('snacks'));

    } // end function



} // end class

