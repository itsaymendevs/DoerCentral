<?php

namespace App\Livewire\Dashboard\Inventory;

use App\Models\StockPurchase;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Purchases extends Component
{



    use HelperTrait;
    use WithPagination;



    // :: variable
    public $searchPONumber = '';

    public $removeId, $confirmId;








    public function manageIngredients($id)
    {

        // :: dispatchId
        $this->dispatch('managePurchaseIngredients', $id);

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
            $this->dispatch('refreshStock');
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


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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



            // 1.2: makeRequest
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
            ->paginate(env('PAGINATE_XXL'));






        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.purchases', compact('purchases'));


    } // end function


} // end class
