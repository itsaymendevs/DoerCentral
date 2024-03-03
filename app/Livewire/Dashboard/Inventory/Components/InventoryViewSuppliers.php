<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Models\Supplier;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewSuppliers extends Component
{


    use HelperTrait;


    // :: variable
    public $searchSupplier = '';

    public $removeId;








    public function manageIngredients($id)
    {

        // :: dispatchId
        $this->dispatch('manageSupplierIngredients', $id);

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editSupplier', $id);


    } // end function






    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmSupplierRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmSupplierRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/inventory/suppliers/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();


        } // end if



    } // end function






    // ----------------------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $suppliers = Supplier::where('name', 'LIKE', '%' . $this->searchSupplier . '%')->get();






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.components.inventory-view-suppliers', compact('suppliers'));


    } // end function


} // end class


