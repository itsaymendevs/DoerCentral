<?php

namespace App\Livewire\DriverPortal\DriverHome\Components;

use App\Models\CustomerSubscriptionDelivery;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class DriverHomePickup extends Component
{


    use HelperTrait;
    public $deliveryId, $deliveryStatus;







    #[On('pickDelivery')]
    public function remount($id)
    {

        // 1: get instance
        $this->deliveryId = $id;


    } // end function








    // ----------------------------------------------------------







    public function update($id, $status)
    {




        // 1: checkDelivery
        if ($this->deliveryId != $id)
            return false;






        // -------------------------------
        // -------------------------------





        // 2: checkStatus
        $delivery = CustomerSubscriptionDelivery::find($id);


        if ($delivery->status == 'Picked') {

            return false;

        } // end if







        // -------------------------------
        // -------------------------------







        // 1: params - confirmationBox
        $this->deliveryId = $id;
        $this->deliveryStatus = $status;







        // 2: make instance
        $instance = new stdClass();

        $instance->id = $this->deliveryId;
        $instance->status = $this->deliveryStatus;







        // 2.2: makeRequest
        $this->dispatch('closeModal', modal: '#pickup-delivery .btn--close');
        $response = $this->makeRequest('portals/driver/delivery/status/update', $instance);





        // 2.2: renderView
        $this->makeAlert('info', $response->message);
        $this->dispatch('refreshViews');





    } // end function












    // ----------------------------------------------------------






    public function render()
    {

        return view('livewire.driver-portal.driver-home.components.driver-home-pickup');

    } // end function

} // end class
