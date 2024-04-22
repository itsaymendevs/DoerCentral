<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday;

use App\Models\Customer;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionDelivery;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithPagination;

class KitchenTodayCheckout extends Component
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
            ->whereIn('status', ['Pending', 'Completed'])->paginate(16);









        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-checkout', compact('deliveries'));




    } // end function



} // end class




