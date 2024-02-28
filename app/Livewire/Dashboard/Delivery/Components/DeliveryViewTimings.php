<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Models\CityDeliveryTime;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryViewTimings extends Component
{

    use HelperTrait;


    // :: variable
    public $cityId;
    public $searchTiming = '';
    public $removeId;





    public function mount($id)
    {

        // :: params
        $this->cityId = $id;


    } // end function







    // ----------------------------------------------------------------





    public function provideCityId()
    {

        // :: dispatchEvent
        $this->dispatch('provideCityId', $this->cityId);

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editTiming', $id);


    } // end function






    // -----------------------------------------------------------------




    public function remove($id)
    {


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
        $deliveryTimes = CityDeliveryTime::where('cityId', $this->cityId)
            ->where('title', 'LIKE', '%' . $this->searchTiming . '%')
            ->get();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.delivery.components.delivery-view-timings', compact('deliveryTimes'));


    } // end function


} // end class
