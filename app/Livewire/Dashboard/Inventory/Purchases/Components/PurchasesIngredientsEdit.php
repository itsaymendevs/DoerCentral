<?php

namespace App\Livewire\Dashboard\Inventory\Purchases\Components;


use App\Livewire\Forms\StockPurchaseIngredientForm;
use App\Models\StockPurchaseIngredient;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;



class PurchasesIngredientsEdit extends Component
{




    use HelperTrait;
    use ActivityTrait;




    // :: variable
    public StockPurchaseIngredientForm $instance;
    public $purchaseIngredient;
    public $removeId;








    public function mount($id)
    {

        // 1: clone instance / Files
        $this->purchaseIngredient = StockPurchaseIngredient::find($id);

        foreach ($this->purchaseIngredient->toArray() as $key => $value)
            $this->instance->{$key} = $value;



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
        $return = $this->storeActivity('Inventory', "Updated purchase quantity for {$this->purchaseIngredient->ingredient->name} from {$this->purchaseIngredient->quantity} to {$this->instance?->quantity} in PurchaseID. {$this->purchaseIngredient->stockPurchase->purchaseID}");







        // ------------------------------------
        // ------------------------------------








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchases/ingredients/update', $this->instance);





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

        $this->makeAlert('remove', null, 'confirmPurchaseIngredientRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmPurchaseIngredientRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/inventory/purchases/ingredients/remove', $this->removeId);
            $this->makeAlert('info', $response?->message);



            $this->dispatch('refreshViews');


        } // end if



    } // end function






    // ----------------------------------------------------------------






    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.purchases.components.purchases-ingredients-edit');


    } // end function


} // end class
