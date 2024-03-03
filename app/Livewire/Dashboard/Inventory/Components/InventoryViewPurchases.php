<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Models\StockPurchase;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewPurchases extends Component
{


    use HelperTrait;


    // :: variable
    public $searchPONumber = '';

    public $removeId;
    public $confirmId;








    public function viewIngredients($id)
    {

        // :: dispatchId
        $this->dispatch('viewPurchaseIngredients', $id);

    } // end function




    // -----------------------------------------------------------------







    public function confirm($id)
    {

        // 1: params - confirmationBox
        $this->confirmId = $id;

        $this->makeAlert('question', 'Confirm Purchase?', 'confirmPurchaseReceiving');

    } // end function





    // -----------------------------------------------------------------







    #[On('confirmPurchaseReceiving')]
    public function confirmReceiving()
    {


        // 1: remove
        if ($this->confirmId) {

            $response = $this->makeRequest('dashboard/inventory/purchases/confirm', $this->confirmId);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();


        } // end if



    } // end function














    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editPurchase', $id);


    } // end function






    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmPurchaseRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmPurchaseRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/inventory/purchases/remove', $this->removeId);
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
        $purchases = StockPurchase::where('PONumber', 'LIKE', '%' . $this->searchPONumber . '%')
            ->orWhere('purchaseID', 'LIKE', '%' . $this->searchPONumber . '%')
            ->get();






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.components.inventory-view-purchases', compact('purchases'));


    } // end function


} // end class




