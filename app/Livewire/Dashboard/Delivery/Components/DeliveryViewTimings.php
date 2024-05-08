<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\City;
use App\Models\CityDeliveryTime;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class DeliveryViewTimings extends Component
{

    use HelperTrait;


    // :: variable
    public $city;
    public $searchTiming = '';
    public $removeId;





    public function mount($id)
    {

        // :: params
        $this->city = City::find($id);


    } // end function







    // ----------------------------------------------------------------





    public function provideCityId()
    {

        // :: dispatchEvent
        $this->dispatch('provideCityId', $this->city->id);

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editTiming', $id);


    } // end function









    // ------------------------------------------------------------------








    public function updateCharge($deliveryCharge)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // :: create instance
        $instance = new stdClass();

        $instance->id = $this->city->id;
        $instance->deliveryCharge = $deliveryCharge;



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/charges/update', $instance);




        // :: makeAlert
        $this->makeAlert('success', $response->message);




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

        $this->makeAlert('remove', null, 'confirmTimingRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmTimingRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {

            $response = $this->makeRequest('dashboard/delivery/times/remove', $this->removeId);
            $this->makeAlert('info', $response->message);

        } // end if





        // 1.2: renderView
        $this->render();


    } // end function






    // ----------------------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $deliveryTimes = CityDeliveryTime::where('cityId', $this->city->id)
            ->where('title', 'LIKE', '%' . $this->searchTiming . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.components.delivery-view-timings', compact('deliveryTimes'));


    } // end function





} // end class
