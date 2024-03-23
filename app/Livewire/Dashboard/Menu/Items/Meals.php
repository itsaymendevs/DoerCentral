<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Meals extends Component
{


    use HelperTrait;



    // :: variables
    public $searchMeal = '';








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Meal')->first();

        $meals = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchMeal . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.meals', compact('meals'));


    } // end function







} // end class



