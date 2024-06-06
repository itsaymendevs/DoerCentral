<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IngredientsList extends Component
{




    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchIngredient = '';
    public $searchCategory, $searchGroup;







    // ----------------------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $categories = IngredientCategory::all();
        $groups = IngredientGroup::all();







        // --------------------------------
        // --------------------------------







        // 1.2: ingredients - makeFilter
        $ingredientsRaw = Ingredient::whereHas('meals')
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')->get();




        $ingredients = $ingredientsRaw->filter(function ($item) {

            $toReturn = true;


            // 1: category
            $this->searchCategory ? $item->categoryId != $this->searchCategory ? $toReturn = false : null : null;

            return $toReturn;

        });








        // 1.2.2: finalIngredients
        $ingredients = Ingredient::whereHas('meals')
            ->orderBy('categoryId')
            ->whereIn('id', $ingredients?->pluck('id')?->toArray() ?? [])
            ->get();











        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.ingredients-list', compact('ingredients', 'categories', 'groups'));


    } // end function







} // end class
