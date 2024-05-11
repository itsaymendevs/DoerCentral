<?php

namespace App\Livewire\Dashboard\Inventory\Suppliers\Components;


use App\Livewire\Forms\SupplierForm;
use App\Models\Supplier;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;


class SuppliersEdit extends Component
{




    use HelperTrait;



    // :: variables
    public SupplierForm $instance;









    #[On('editSupplier')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $supplier = Supplier::find($id);

        foreach ($supplier->toArray() as $key => $value)
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
        $response = $this->makeRequest('dashboard/inventory/suppliers/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('closeModal', modal: '#edit-supplier .btn--close');
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.suppliers.components.suppliers-edit');


    } // end function


} // end class
