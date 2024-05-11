<?php

namespace App\Livewire\Dashboard\Inventory\Purchases\Components;


use App\Livewire\Forms\StockPurchaseForm;
use App\Models\StockPurchase;
use App\Models\Supplier;
use App\Traits\HelperTrait;
use Livewire\Component;


class PurchasesCreate extends Component
{



    use HelperTrait;



    // :: variable
    public StockPurchaseForm $instance;






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
        $response = $this->makeRequest('dashboard/inventory/purchases/store', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-purchase .btn--close');


        $this->makeAlert('success', $response?->message);




    } // end function





    // ------------------------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $suppliers = Supplier::all();
        $po = $this->makeSerial('PO', StockPurchase::count() + 1);



        return view('livewire.dashboard.inventory.purchases.components.purchases-create', compact('suppliers', 'po'));

    } // end function


} // end class
