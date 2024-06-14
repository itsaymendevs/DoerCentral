<?php

namespace App\Livewire\Dashboard\Inventory;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\Supplier;
use App\Models\SupplierIngredient;
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
        $supplierIngredientsRaw = SupplierIngredient::all();




        $supplierIngredients = $supplierIngredientsRaw->filter(function ($item) {


            $toReturn = true;


            // 1: ingredient - category
            $this->searchIngredient ? ! str_contains(strtolower($item?->ingredient?->name), $this->searchIngredient) ? $toReturn = false : null : null;

            $this->searchCategory ? $item?->ingredient?->categoryId != $this->searchCategory ? $toReturn = false : null : null;



            return $toReturn;

        });









        // ---------------------------------------------------
        // ---------------------------------------------------









        // 1.2.2: finalSupplierIngredients
        $supplierIngredients = SupplierIngredient::orderBy('ingredientId')
            ->whereIn('id', $supplierIngredients?->pluck('id')?->toArray() ?? [])
            ->get();



        $suppliers = Supplier::whereIn('id', $supplierIngredients?->pluck('supplierId')?->toArray())->get();








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.comparisons', compact('supplierIngredients', 'categories', 'suppliers'));




    } // end function







} // end class
