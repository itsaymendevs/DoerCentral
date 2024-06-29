<?php

namespace App\Livewire\Dashboard\Stock\Purchases\Components;

use App\Livewire\Forms\StockItemPurchaseItemForm;
use App\Models\StockItemPurchaseContainer;
use App\Models\StockItemPurchaseItem;
use App\Models\StockItemPurchaseLabel;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class PurchasesItemsEdit extends Component
{


    use HelperTrait;
    use ActivityTrait;




    // :: variable
    public StockItemPurchaseItemForm $instance;
    public $purchaseItem;








    public function mount($id, $type)
    {


        // 1: get instance
        if ($type == 'Containers') {

            $this->purchaseItem = StockItemPurchaseContainer::find($id);

        } elseif ($type == 'Labels') {

            $this->purchaseItem = StockItemPurchaseLabel::find($id);

        } elseif ($type == 'Items') {

            $this->purchaseItem = StockItemPurchaseItem::find($id);

        } // end if




        foreach ($this->purchaseItem?->toArray() as $key => $value)
            $this->instance->{$key} = $value;




        // 1.2: extra
        $this->instance->type = $type;

        $this->instance->itemId = $this->purchaseItem->item?->id;
        $this->instance->itemName = $this->purchaseItem->item?->name;
        $this->instance->unitName = $this->purchaseItem->unit?->name;




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





        // ## log - activity ##
        $return = $this->storeActivity('Stock', "Updated purchase quantity for {$this->instance->itemName} from {$this->purchaseItem->quantity} to {$this->instance?->quantity} in PurchaseID. {$this->purchaseItem->stockPurchase->purchaseID}");







        // ------------------------------------
        // ------------------------------------







        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/stock/purchases/items/update', $this->instance);





        // :: resetForm - resetFilePreview
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response?->message);



    } // end function






    // -----------------------------------------------------------------








    public function remove($id)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPurchaseItemRemove');



    } // end function







    // -----------------------------------------------------------------------------







    #[On('confirmPurchaseItemRemove')]
    public function confirmRemove()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/stock/purchases/items/remove', $this->instance);
        $this->makeAlert('info', $response?->message);



        $this->dispatch('refreshViews');





    } // end function






    // ----------------------------------------------------------------








    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.purchases.components.purchases-items-edit');


    } // end function


} // end class
