<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\StockPurchaseIngredientForm;
use App\Models\StockPurchaseIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewPurchaseIngredient extends Component
{




    use HelperTrait;


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



        // :: validation
        $this->instance->validate();




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/purchases/ingredients/update', $this->instance);





        // :: resetForm - resetFilePreview
        $this->makeAlert('success', $response?->message);



    } // end function






    // -----------------------------------------------------------------








    public function remove($id)
    {


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



        return view('livewire.dashboard.inventory.components.inventory-view-purchase-ingredient');


    } // end function


} // end class



