<?php

namespace App\Livewire\DriverPortal;

use App\Models\CityDistrict;
use App\Models\CustomerAddress;
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
    public $searchDistrict, $searchStatus, $searchDeliveryDate;





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





        // -------------------------------------------
        // -------------------------------------------






        // 2: deliveries
        $deliveries = null;



        // 2.1: dateWise
        if ($this->searchDeliveryDate) {





            // 2.2: districtWise
            if ($this->searchDistrict) {




                // 2.2: prepDistrictFilter
                $weekDay = date('l', strtotime($this->searchDeliveryDate));



                $customerAddresses = CustomerAddress::whereHas('deliveryDays', function ($query) use ($weekDay) {

                    $query?->where('weekDay', $weekDay);

                })?->where('cityDistrictId', $this->searchDistrict)?->pluck('customerId')?->toArray() ?? [];









                // 2.3: getDeliveries
                $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                    ->where('deliveryDate', $this->searchDeliveryDate)
                    ->where('driverId', $this->driver?->id)
                    ->whereIn('customerId', $customerAddresses)
                    ->where('status', 'LIKE', '%' . $this->searchStatus ?? '' . '%')
                    ->get();






                // 2.5: regular
            } else {


                $deliveries = CustomerSubscriptionDelivery::whereIn('status', $statuses)
                    ->where('deliveryDate', $this->searchDeliveryDate)
                    ->where('driverId', $this->driver?->id)
                    ->where('status', 'LIKE', '%' . $this->searchStatus ?? '' . '%')
                    ->get();


            } // end if











        } // end if








        return view('livewire.driver-portal.driver-history', compact('districts', 'deliveries', 'statuses'));



    } // end function



} // end class
