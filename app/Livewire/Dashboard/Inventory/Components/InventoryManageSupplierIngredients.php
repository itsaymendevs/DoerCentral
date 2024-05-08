<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\SupplierIngredientForm;
use App\Models\Ingredient;
use App\Models\Supplier;
use App\Models\SupplierIngredient;
use App\Models\Unit;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageSupplierIngredients extends Component
{



    use HelperTrait;



    // :: variables
    public SupplierIngredientForm $instance;









    #[On('manageSupplierIngredients')]
    public function remount($id)
    {

        // 1: get supplierId
        $this->instance->supplierId = $id;



    } // end function








    // -----------------------------------------------------------




    public function store()
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validation
        $this->instance->validate();



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/suppliers/ingredients/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset('ingredientId', 'sellPrice', 'unitId');
        $this->dispatch('resetSelect');
        $this->render();


        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------










    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::all();
        $units = Unit::all();


        // 1.2: supplierIngredients
        $supplierIngredients = $this->instance?->supplierId ? SupplierIngredient::where('supplierId', $this->instance->supplierId)->get() : [];




        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.components.inventory-manage-supplier-ingredients', compact('ingredients', 'units', 'supplierIngredients'));


    } // end function


} // end class


