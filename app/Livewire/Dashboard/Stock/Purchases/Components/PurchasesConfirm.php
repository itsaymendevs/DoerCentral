<?php

namespace App\Livewire\Dashboard\Stock\Purchases\Components;

use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseContainer;
use App\Models\StockItemPurchaseItem;
use App\Models\StockItemPurchaseLabel;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class PurchasesConfirm extends Component
{


    use HelperTrait;



    // :: variables
    public $purchase;
    public $receivedLabelsQuantity = [], $receivedContainersQuantity = [], $receivedItemsQuantity = [];









    #[On('confirmPurchase')]
    public function remount($id)
    {


        // 1: get instance
        $this->purchase = StockItemPurchase::find($id);



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

        $instance->receivedItemsQuantity = $this->receivedItemsQuantity ?? [];
        $instance->receivedLabelsQuantity = $this->receivedLabelsQuantity ?? [];
        $instance->receivedContainersQuantity = $this->receivedContainersQuantity ?? [];






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/purchases/confirm', $instance);






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
        $purchaseItems = $this->purchase ?
            StockItemPurchaseItem::where('stockItemPurchaseId', $this->purchase->id)->get() : [];


        $purchaseLabels = $this->purchase ?
            StockItemPurchaseLabel::where('stockItemPurchaseId', $this->purchase->id)->get() : [];


        $purchaseContainers = $this->purchase ?
            StockItemPurchaseContainer::where('stockItemPurchaseId', $this->purchase->id)->get() : [];









        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.purchases.components.purchases-confirm', compact('purchaseItems', 'purchaseLabels', 'purchaseContainers'));


    } // end function





} // end class
