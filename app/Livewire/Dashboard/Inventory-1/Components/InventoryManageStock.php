<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Models\Ingredient;
use App\Models\StockPurchase;
use App\Models\StockPurchaseIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryManageStock extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchIngredient = '';








    #[On('refreshStock')]
    public function render()
    {


        // 1: dependencies
        $ingredientsList = Ingredient::where('name', 'LIKE', '%' . $this->searchIngredient . '%')?->get()->pluck('id')?->toArray() ?? [];







        // 1.2: stockPurchases => stockIngredients
        $stockPurchases = StockPurchase::where('isConfirmed', true)->get()?->pluck('id')?->toArray() ?? [];
        $stockIngredients = StockPurchaseIngredient::whereIn('stockPurchaseId', $stockPurchases)
            ->whereIn('ingredientId', $ingredientsList)->get();






        return view('livewire.dashboard.inventory.components.inventory-manage-stock', compact('stockIngredients'));


    } // end function


} // end class
