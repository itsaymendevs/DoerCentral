<?php

namespace App\Livewire\Dashboard\Stock\Purchases\Components;

use App\Livewire\Forms\StockItemPurchaseForm;
use App\Models\StockItemPurchase;
use App\Models\Vendor;
use App\Traits\HelperTrait;
use Livewire\Component;

class PurchasesCreate extends Component
{


    use HelperTrait;



    // :: variable
    public StockItemPurchaseForm $instance;






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
        $response = $this->makeRequest('dashboard/stock/purchases/store', $this->instance);






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
        $vendors = Vendor::all();
        $po = $this->makeSerial('PO', StockItemPurchase::count() + 1);



        return view('livewire.dashboard.stock.purchases.components.purchases-create', compact('vendors', 'po'));

    } // end function




} // end class
