<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\CityDeliveryTimeForm;
use App\Models\City;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryCreateTiming extends Component
{

    use HelperTrait;


    // :: variable
    public CityDeliveryTimeForm $instance;







    #[On('provideCityId')]
    public function remount($id)
    {

        // :: params
        $this->instance->cityId = $id;


    } // end function





    // ----------------------------------------------------------------








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
        $response = $this->makeRequest('dashboard/delivery/times/store', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#new-timing .btn--close');


        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $city = $this->instance->cityId ? City::find($this->instance->cityId) : null;



        return view('livewire.dashboard.delivery.components.delivery-create-timing', compact('city'));

    } // end function

} // end class
