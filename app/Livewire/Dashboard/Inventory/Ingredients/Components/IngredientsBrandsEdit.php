<?php

namespace App\Livewire\Dashboard\Inventory\Ingredients\Components;

use App\Livewire\Forms\IngredientBrandForm;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class IngredientsBrandsEdit extends Component
{


    use HelperTrait;


    // :: variables
    public IngredientBrandForm $instance;
    public $removeId;



    public function mount($brand)
    {


        // :: clone
        foreach ($brand?->toArray() as $key => $value)
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



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/ingredients/brands/update', $this->instance);





        // :: alert
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

        $this->makeAlert('remove', null, 'confirmBrandRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmBrandRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/inventory/ingredients/brands/remove', $this->removeId);
            $this->makeAlert('info', $response->message);


        } // end if




        // 1.2: refreshBrands
        $this->dispatch('refreshBrands');



    } // end function









    // --------------------------------------------------------------









    public function render()
    {

        return view('livewire.dashboard.inventory.ingredients.components.ingredients-brands-edit');

    } // end function




} // end class
