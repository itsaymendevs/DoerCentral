<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryVehicles\Components;

use App\Livewire\Forms\VehiclePromotionForm;
use App\Models\Vehicle;
use App\Models\VehiclePromotion;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryVehiclesPromotion extends Component
{


    use HelperTrait;



    // :: variables
    public VehiclePromotionForm $instance;









    #[On('editPromotion')]
    public function remount($id)
    {


        // 1: clone instance
        $promotion = VehiclePromotion::find($id);


        foreach ($promotion->toArray() as $key => $value)
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





        // 1: validation
        $this->instance->validate();






        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/delivery/vehicles/promotions/update', $this->instance);






        // :: re-render
        $this->makeAlert('success', $response->message);
        $this->render();



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.delivery-vehicles.components.delivery-vehicles-promotion');


    } // end function







} // end class
