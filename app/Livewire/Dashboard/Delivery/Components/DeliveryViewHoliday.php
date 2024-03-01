<?php

namespace App\Livewire\Dashboard\Delivery\Components;

use App\Livewire\Forms\HolidayForm;
use App\Models\Holiday;
use App\Traits\HelperTrait;
use Livewire\Component;

class DeliveryViewHoliday extends Component
{


    use HelperTrait;



    // :: variables
    public HolidayForm $instance;





    public function mount($id)
    {


        // 1: clone instance
        $holiday = Holiday::find($id);

        foreach ($holiday->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function










    // ------------------------------------------------------------------








    public function update()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/holidays/update', $this->instance);




        // :: makeAlert
        $this->makeAlert('success', $response->message);




    } // end function








    // ----------------------------------------------------------------







    public function toggleActive($id)
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/holidays/toggle', $id);



        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function








    // -----------------------------------------------------------------






    public function render()
    {

        return view('livewire.dashboard.delivery.components.delivery-view-holiday');

    } // end function




} // end class
