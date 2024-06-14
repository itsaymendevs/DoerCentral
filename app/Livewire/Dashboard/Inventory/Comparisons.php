<?php

namespace App\Livewire\Dashboard\Inventory;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class Comparisons extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchCategory, $searchIngredient = '';







    public function render()
    {



        // 1: dependencies
        $categories = IngredientCategory::all();






        // 1.2: ingredients - makeFilter
        $ingredientsRaw = Ingredient::whereHas('suppliers')
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')->get();




        $ingredients = $ingredientsRaw->filter(function ($item) {


            // 1: category
            $toReturn = true;
            $this->searchCategory ? $item->categoryId != $this->searchCategory ? $toReturn = false : null : null;


            return $toReturn;

        });








        // 1.2.2: finalIngredients
        $ingredients = Ingredient::whereHas('suppliers')
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $ingredients?->pluck('id')?->toArray() ?? [])
            ->paginate(env('PAGINATE_XXL'));











        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.comparisons', compact('ingredients', 'categories'));




    } // end function







} // end class
