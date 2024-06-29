<?php

namespace App\Livewire\Dashboard\Stock\Purchases\Components;

use App\Livewire\Forms\StockItemPurchaseForm;
use App\Models\StockItemPurchase;
use App\Models\Vendor;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PurchasesEdit extends Component
{


    use HelperTrait;



    // :: variables
    public StockItemPurchaseForm $instance;









    #[On('editPurchase')]
    public function remount($id)
    {


        // 1: get instance
        $purchase = StockItemPurchase::find($id);

        foreach ($purchase->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        $this->dispatch('setSelect', id: '#purchase-vendor-select-2', value: $purchase->vendorId);




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
        $response = $this->makeRequest('dashboard/stock/purchases/update', $this->instance);






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
        $vendors = Vendor::all();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.purchases.components.purchases-edit', compact('vendors'));


    } // end function





} // end class
