<?php

namespace App\Livewire\DriverPortal;

use App\Models\CityDistrict;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;


#[Layout('livewire.layouts.portals.driver.dashboard')]
class DriverHome extends Component
{


    use HelperTrait;


    // :: variables
    public $driver, $deliveryId, $deliveryStatus;
    public $searchDistrictId, $searchStatus;





    public function mount()
    {


        // :: init
        $this->driver = Driver::find(session('driverId'));


    } // end function








    // ----------------------------------------------------------






    public function update($id, $status)
    {



        // 1: params - confirmationBox
        $this->deliveryId = $id;
        $this->deliveryStatus = $status;


        $this->makeAlert('question', "Change the current delivery status to {$status}", 'confirmDeliveryUpdate');




    } // end function











    // ----------------------------------------------------------







    #[On('confirmDeliveryUpdate')]
    public function confirmUpdate()
    {




        // :: exists
        if ($this->deliveryId && $this->deliveryStatus) {



            // 1: make instance
            $instance = new stdClass();

            $instance->id = $this->deliveryId;
            $instance->status = $this->deliveryStatus;







            // 1.2: makeRequest
            $response = $this->makeRequest('portals/driver/delivery/status/update', $instance);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();




        } // end if






    } // end function











    // ----------------------------------------------------------





    public function confirmDelivery($id)
    {



        // :: dispatchEvent
        $this->dispatch('confirmDelivery', $id);




    } // end function








    // ----------------------------------------------------------





    public function viewDeliveryMap($id)
    {


        // :: dispatchEvent
        $this->dispatch('viewDeliveryMap', $id);




    } // end function







    // ----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $statuses = ['Pending', 'Picked', 'Canceled', 'Completed'];
        $districts = CityDistrict::whereIn('id', $this->driver?->districts()?->pluck('id')?->toArray() ?? [])?->get();





        // 1.2: deliveries
        $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
            ->where('deliveryDate', $this->getCurrentDate())
            ->where('driverId', $this->driver?->id)
            ->where('status', 'LIKE', '%' . $this->searchStatus ?? '' . '%')
            ->get();









        return view('livewire.driver-portal.driver-home', compact('districts', 'deliveries', 'statuses'));



    } // end function



} // end class
