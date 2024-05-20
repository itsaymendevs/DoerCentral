<?php

namespace App\Livewire\DriverPortal;

use App\Models\CityDistrict;
use App\Models\CustomerSubscriptionDelivery;
use App\Models\Driver;
use App\Traits\HelperTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;



#[Layout('livewire.layouts.portals.driver.dashboard')]
class DriverHistory extends Component
{



    use HelperTrait;


    // :: variables
    public $driver, $deliveryId, $deliveryStatus;
    public $searchDistrictId, $searchStatus, $searchDeliveryDate;





    public function mount()
    {


        // :: init
        $this->driver = Driver::find(session('driverId'));


    } // end function




















    // ----------------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {



        // 1: dependencies
        $statuses = ['Pending', 'Picked', 'Canceled', 'Completed'];
        $districts = CityDistrict::whereIn('id', $this->driver?->districts()?->pluck('id')?->toArray() ?? [])?->get();





        // :: resetFilter - changeFilter
        $this->searchDeliveryDate == '' ? $this->searchDeliveryDate = null : null;




        // 1.2: deliveries
        $deliveries = null;

        if ($this->searchDeliveryDate) {


            $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                ->where('deliveryDate', $this->searchDeliveryDate)
                ->where('driverId', $this->driver?->id)
                ->where('status', 'LIKE', '%' . $this->searchStatus ?? '' . '%')
                ->get();


        } // end if








        return view('livewire.driver-portal.driver-history', compact('districts', 'deliveries', 'statuses'));



    } // end function



} // end class
