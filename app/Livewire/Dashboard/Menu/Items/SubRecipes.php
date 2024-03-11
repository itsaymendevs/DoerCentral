<?php

namespace App\Livewire\Dashboard\Menu\Items;

use App\Models\Meal;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SubRecipes extends Component
{


    use HelperTrait;


    // :: variables
    public $searchSubRecipe = '';






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $type = Type::where('name', 'Sub-recipe')->first();

        $subRecipes = Meal::where('typeId', $type->id)
            ->where('name', 'LIKE', '%' . $this->searchSubRecipe . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.items.sub-recipes', compact('subRecipes'));

    } // end function



} // end class

