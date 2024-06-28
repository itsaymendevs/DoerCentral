<?php

namespace App\Livewire\Dashboard\Stock\Vendors\Components;

use App\Livewire\Forms\VendorForm;
use App\Models\Vendor;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class VendorsEdit extends Component
{

    use HelperTrait;



    // :: variables
    public VendorForm $instance;









    #[On('editVendor')]
    public function remount($id)
    {

        // 1: get instance
        $supplier = Vendor::find($id);

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
        $response = $this->makeRequest('dashboard/stock/vendors/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-vendor .btn--close');
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.stock.vendors.components.vendors-edit');


    } // end function




} // end class
