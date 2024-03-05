<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\StockPurchaseForm;
use App\Livewire\Forms\StockPurchaseIngredientForm;
use App\Models\Ingredient;
use App\Models\StockPurchase;
use App\Models\StockPurchaseIngredient;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManagePurchaseIngredients extends Component
{


    use HelperTrait;



    // :: variables
    public StockPurchaseIngredientForm $instance;
    public $purchase;









    #[On('managePurchaseIngredients')]
    public function remount($id)
    {

        // 1: clone instance
        $this->purchase = StockPurchase::find($id);

        $this->instance->stockPurchaseId = $this->purchase->id;


    } // end function





    // -----------------------------------------------------------






    public function getUnit()
    {


        // 1.2: get supplierIngredient - then Unit
        if ($this->instance?->ingredientId && $this->purchase?->supplierId) {

            $supplierIngredient = SupplierIngredient::where('supplierId', $this->purchase->supplierId)
                ->where('ingredientId', $this->instance->ingredientId)
                ->first();


            $this->instance->unitName = $supplierIngredient->unit->name;

        } // end if


    } // end function








    // -----------------------------------------------------------




    public function store()
    {




        // :: validation
        $this->instance->validate();



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchases/ingredients/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset('ingredientId', 'quantity', 'unitName');
        $this->dispatch('resetSelect');
        $this->render();



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: ingredients
        $supplierIngredients = $this->purchase ? SupplierIngredient::where('supplierId', $this->purchase->supplierId)->get() : [];

        $purchaseIngredients = $this->purchase ? StockPurchaseIngredient::where('stockPurchaseId', $this->purchase->id)->get() : [];





        // :: initTooltips
        $this->dispatch('initTooltips');
        $this->dispatch('refreshRawSelect', id: '#purchase-ingredient-select-2');




        return view('livewire.dashboard.inventory.components.inventory-manage-purchase-ingredients', compact('supplierIngredients', 'purchaseIngredients'));


    } // end function


} // end class

