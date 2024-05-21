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




        // :: per 100G
        $this->instance->calories *= 100;
        $this->instance->proteins *= 100;
        $this->instance->carbs *= 100;
        $this->instance->fats *= 100;
        $this->instance->cholesterol *= 100;
        $this->instance->sodium *= 100;
        $this->instance->fiber *= 100;
        $this->instance->sugar *= 100;
        $this->instance->calcium *= 100;
        $this->instance->iron *= 100;
        $this->instance->vitaminA *= 100;
        $this->instance->vitaminC *= 100;





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
