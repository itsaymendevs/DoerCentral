<?php

namespace App\Livewire\Dashboard\Stock\Vendors\Components;

use App\Livewire\Forms\VendorForm;
use App\Traits\HelperTrait;
use Livewire\Component;

class VendorsCreate extends Component
{

    use HelperTrait;



    // :: variable
    public VendorForm $instance;






    public function store()
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // :: validate
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/stock/vendors/store', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#new-vendor .btn--close');


        $this->makeAlert('success', $response?->message);




    } // end function





    // ------------------------------------------------------------------








    public function render()
    {


        return view('livewire.dashboard.stock.vendors.components.vendors-create');


    } // end function


} // end class
