<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\StockPurchaseForm;
use App\Models\StockPurchase;
use App\Models\Supplier;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryEditPurchase extends Component
{


    use HelperTrait;



    // :: variables
    public StockPurchaseForm $instance;









    #[On('editPurchase')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $purchase = StockPurchase::find($id);

        foreach ($purchase->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        $this->dispatch('setSelect', id: '#purchase-supplier-select-2', value: $purchase->supplierId);




    } // end function








    // -----------------------------------------------------------




    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: validation
        $this->instance->validate();



        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchases/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-purchase .btn--close');



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $suppliers = Supplier::all();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.components.inventory-edit-purchase', compact('suppliers'));


    } // end function


} // end class

