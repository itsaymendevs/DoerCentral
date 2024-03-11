<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use App\Models\Type;
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
        $type = Type::where('name', 'Meal')->first();

        $meals = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchRecipe . '%')
            ->get();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.recipes', compact('meals'));

    } // end function



} // end class



