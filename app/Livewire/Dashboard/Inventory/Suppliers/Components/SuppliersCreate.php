<?php

namespace App\Livewire\Dashboard\Inventory\Suppliers\Components;

use App\Livewire\Forms\SupplierForm;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Component;


class SuppliersCreate extends Component
{



    use HelperTrait;



    // :: variable
    public SupplierForm $instance;






    public function store()
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // :: validate
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/suppliers/store', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-supplier .btn--close');


        $this->makeAlert('success', $response?->message);




    } // end function





    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $categories = IngredientCategory::all();



        return view('livewire.dashboard.inventory.suppliers.components.suppliers-create', compact('categories'));



    } // end function


} // end class
