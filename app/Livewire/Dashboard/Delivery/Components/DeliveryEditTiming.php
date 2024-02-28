<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\CityDeliveryTimeForm;
use App\Models\City;
use App\Models\CityDeliveryTime;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryEditTiming extends Component
{

    use HelperTrait;




    // :: variables
    public CityDeliveryTimeForm $instance;








    #[On('editTiming')]
    public function remount($id)
    {

        // 1: clone instance
        $deliveryTime = CityDeliveryTime::find($id);

        foreach ($deliveryTime->toArray() as $key => $value)
            $this->instance->{$key} = $value;



    } // end function





    // -----------------------------------------------------------








    public function update()
    {



        // :: validate
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/times/update', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#edit-timing .btn--close');




        // :: alert
        $this->makeAlert('success', $response->message);




    } // end function











    // -----------------------------------------------------------



    public function render()
    {

        // 1: dependencies
        $city = $this->instance->cityId ? City::find($this->instance->cityId) : null;



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.components.delivery-edit-timing', compact('city'));

    } // end function


} // end class


