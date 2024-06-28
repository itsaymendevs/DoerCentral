<?php

namespace App\Livewire\Dashboard\Stock\Vendors\Components;

use App\Livewire\Forms\VendorItemForm;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class VendorsItemsEdit extends Component
{


    use HelperTrait;


    // :: variable
    public VendorItemForm $instance;








    public function mount($id, $type)
    {

        // 1: clone instance / Files
        // $supplierIngredient = SupplierIngredient::find($id);

        // foreach ($supplierIngredient->toArray() as $key => $value)
        //     $this->instance->{$key} = $value;



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

        $this->makeAlert('remove', null, 'confirmVendorItemRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmVendorItemRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {



            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/stock/vendors/items/remove', $this->removeId);
            $this->makeAlert('info', $response?->message);



            $this->dispatch('refreshViews');


        } // end if



    } // end function






    // ----------------------------------------------------------------






    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.stock.vendors.components.vendors-items-edit');


    } // end function


} // end class
