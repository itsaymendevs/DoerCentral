<?php

namespace App\Livewire\Dashboard\Inventory\Suppliers\Components;


use App\Livewire\Forms\SupplierIngredientForm;
use App\Models\SupplierIngredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;



class SuppliersIngredientsEdit extends Component
{



    use HelperTrait;


    // :: variable
    public SupplierIngredientForm $instance;
    public $removeId;








    public function mount($id)
    {

        // 1: clone instance / Files
        $supplierIngredient = SupplierIngredient::find($id);

        foreach ($supplierIngredient->toArray() as $key => $value)
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




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/suppliers/ingredients/update', $this->instance);





        // :: resetForm - resetFilePreview
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

        $this->makeAlert('remove', null, 'confirmSupplierIngredientRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmSupplierIngredientRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/inventory/suppliers/ingredients/remove', $this->removeId);
            $this->makeAlert('info', $response?->message);



            $this->dispatch('refreshViews');


        } // end if



    } // end function






    // ----------------------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $supplierIngredient = $this->instance?->id ? SupplierIngredient::find($this->instance->id) : null;




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.suppliers.components.suppliers-ingredients-edit', compact('supplierIngredient'));


    } // end function


} // end class
