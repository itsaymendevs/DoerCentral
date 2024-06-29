<?php

namespace App\Livewire\Dashboard\Stock\Purchases\Components;

use App\Livewire\Forms\StockItemPurchaseItemForm;
use App\Models\StockItemPurchase;
use App\Models\StockItemPurchaseContainer;
use App\Models\StockItemPurchaseItem;
use App\Models\StockItemPurchaseLabel;
use App\Models\VendorContainer;
use App\Models\VendorItem;
use App\Models\VendorLabel;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PurchasesItems extends Component
{


    use HelperTrait;



    // :: variables
    public StockItemPurchaseItemForm $instance;
    public $purchase;









    #[On('managePurchaseItems')]
    public function remount($id)
    {

        // 1: get instance
        $this->purchase = StockItemPurchase::find($id);

        $this->instance->stockItemPurchaseId = $this->purchase->id;




    } // end function






    // -----------------------------------------------------------







    public function getUnit()
    {


        // 1: get instance
        if ($this->instance?->itemId && $this->purchase?->vendorId) {



            // 1.2: determineType
            if ($this->instance?->type == 'Containers') {

                $item = VendorContainer::where('vendorId', $this->purchase->vendorId)
                    ->where('containerId', $this->instance->itemId)
                    ->first();


            } elseif ($this->instance->type == 'Labels') {


                $item = VendorLabel::where('vendorId', $this->purchase->vendorId)
                    ->where('labelId', $this->instance->itemId)
                    ->first();


            } elseif ($this->instance->type == 'Items') {


                $item = VendorItem::where('vendorId', $this->purchase->vendorId)
                    ->where('itemId', $this->instance->itemId)
                    ->first();

            } // end id







            // 1.3: getUnit
            $this->instance->unitName = $item?->unit?->name ?? null;




        } // end if



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
        $response = $this->makeRequest('dashboard/stock/purchases/items/store', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset('itemId', 'quantity', 'unitName', 'itemName');
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $types = ['Containers', 'Labels', 'Items'];





        // 1.2: items
        $vendorItems = $this->purchase ? VendorItem::where('vendorId', $this->purchase->vendorId)->get() : [];
        $vendorLabels = $this->purchase ? VendorLabel::where('vendorId', $this->purchase->vendorId)->get() : [];
        $vendorContainers = $this->purchase ? VendorContainer::where('vendorId', $this->purchase->vendorId)->get() : [];




        // 1.3: purchaseItems
        $purchaseItems = $this->purchase ?
            StockItemPurchaseItem::where('stockItemPurchaseId', $this->purchase->id)->get() : [];


        $purchaseLabels = $this->purchase ?
            StockItemPurchaseLabel::where('stockItemPurchaseId', $this->purchase->id)->get() : [];


        $purchaseContainers = $this->purchase ?
            StockItemPurchaseContainer::where('stockItemPurchaseId', $this->purchase->id)->get() : [];







        return view('livewire.dashboard.stock.purchases.components.purchases-items', compact('types', 'vendorItems', 'vendorLabels', 'vendorContainers', 'purchaseItems', 'purchaseLabels', 'purchaseContainers'));


    } // end function


} // end class
