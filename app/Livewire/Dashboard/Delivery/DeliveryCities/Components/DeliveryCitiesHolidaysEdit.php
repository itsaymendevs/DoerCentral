<?php

namespace App\Livewire\Dashboard\Delivery\DeliveryCities\Components;

use App\Livewire\Forms\HolidayForm;
use App\Models\CityHoliday;
use App\Models\Holiday;
use App\Traits\HelperTrait;
use Livewire\Component;



class DeliveryCitiesHolidaysEdit extends Component
{


    use HelperTrait;



    // :: variables
    public HolidayForm $instance;





    public function mount($id)
    {


        // 1: clone instance
        $holiday = CityHoliday::find($id);

        foreach ($holiday->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function










    // ------------------------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/holidays/update', $this->instance);




        // :: makeAlert
        $this->makeAlert('success', $response->message);




    } // end function








    // ----------------------------------------------------------------







    public function toggleActive($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/delivery/holidays/toggle', $id);



        // :: makeAlert
        $this->makeAlert('success', $response->message);



    } // end function








    // -----------------------------------------------------------------






    public function render()
    {

        return view('livewire.dashboard.delivery.delivery-cities.components.delivery-cities-holidays-edit');

    } // end function




} // end class
