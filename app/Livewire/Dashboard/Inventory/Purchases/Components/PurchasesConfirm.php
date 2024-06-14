<?php

namespace App\Livewire\Dashboard\Inventory\Purchases\Components;

use App\Models\StockPurchase;
use App\Models\StockPurchaseIngredient;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class PurchasesConfirm extends Component
{





    use HelperTrait;



    // :: variables
    public $purchase, $receivedQuantity = [];









    #[On('confirmPurchase')]
    public function remount($id)
    {

        // 1: get instance
        $this->purchase = StockPurchase::find($id);



    } // end function










    // -----------------------------------------------------------




    public function update()
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // 1: create instance
        $instance = new stdClass();
        $instance->id = $this->purchase->id;
        $instance->receivedQuantity = $this->receivedQuantity;






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchases/confirm', $instance);






        // :: refresh
        $this->receivedQuantity = [];
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#purchase-confirm .btn--close');
        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------








    public function render()
    {




        // 1: dependencies
        $purchaseIngredients = $this->purchase ? StockPurchaseIngredient::where('stockPurchaseId', $this->purchase->id)->get() : [];





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.purchases.components.purchases-confirm', compact('purchaseIngredients'));


    } // end function





} // end class
