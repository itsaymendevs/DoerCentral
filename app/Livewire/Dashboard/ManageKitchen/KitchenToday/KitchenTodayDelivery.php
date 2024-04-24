<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Exports\KitchenDeliveryExport;
use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class KitchenTodayDelivery extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variables
    public $searchDeliveryDate, $searchCustomer;



    public function mount()
    {


        // :: init
        $this->searchDeliveryDate = $this->getCurrentDate();



    } // end function













    // -----------------------------------------------------------







    public function export()
    {




        // 1: prepareExportData




        // 1.2: dependencies




        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();


        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();










        // 2: getDeliveries
        $deliveries = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchDeliveryDate)
            ->whereIn('customerSubscriptionId', $subscriptions)
            ->whereIn('status', ['Pending', 'Completed'])->paginate(30);










        // ---------------------------------------
        // ---------------------------------------









        // 2: makeExport
        if ($deliveries->count() > 0) {


            return Excel::download(new KitchenDeliveryExport($deliveries), 'kitchen-delivery.xlsx');



            // :: no-packing
        } else {



            $this->makeAlert('info', 'Delivery-list is empty');


        } // end if







    } // end function
















    // -----------------------------------------------------------








    public function render()
    {



        // 1: dependencies




        // 1.2: getCustomersByFilter
        $customers = Customer::where('firstName', 'LIKE', '%' . $this->searchCustomer . '%')
            ->orWhere('lastName', 'LIKE', '%' . $this->searchCustomer . '%')?->pluck('id')->toArray();


        $subscriptions = CustomerSubscription::whereIn('customerId', $customers)->pluck('id')->toArray();










        // 2: getDeliveries
        $deliveries = CustomerSubscriptionDelivery::where('deliveryDate', $this->searchDeliveryDate)
            ->whereIn('customerSubscriptionId', $subscriptions)
            ->whereIn('status', ['Pending', 'Completed'])->paginate(30);









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-delivery', compact('deliveries'));




    } // end function



} // end class

