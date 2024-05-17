<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerAddresses\Components;

use App\Livewire\Forms\CustomerAddressForm;
use App\Livewire\Forms\CustomerForm;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\CustomerDeliveryDay;
use App\Traits\DeliveryTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerAddressesView extends Component
{


    use HelperTrait;
    use DeliveryTrait;




    // :: variables
    public CustomerAddressForm $instance;
    public $address, $counter, $removeId;









    public function mount($id, $counter)
    {

        // 1: getCustomerAddress
        $this->counter = $counter;
        $this->address = CustomerAddress::find($id);




        // :: initiate
        foreach ($this->address->toArray() as $key => $value)
            $this->instance->{$key} = $value;






        // ------------------------------
        // ------------------------------






        // 1.2: deliveryDays - defaultValues
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        foreach ($weekDays as $weekDay)
            $this->instance->deliveryDays[$weekDay] = in_array($weekDay, $this->address->deliveryDaysInArray()) ? true : false;









    } // end function









    // ----------------------------------------------------------








    public function setChildSelect($id)
    {


        // :: setChildSelect



        // 1: district
        if (str_contains($id, 'district'))
            $this->dispatch('refreshRawSelectUsingValue', id: $id);



        // 2: deliveryTime
        if (str_contains($id, 'deliveryTime'))
            $this->dispatch('refreshRawSelectUsingValue', id: $id);





    } // end function










    // -----------------------------------------------------------







    public function update()
    {



        // 1: confirmationBox
        $this->makeAlert('question', 'This change will affect customer upcoming schedules, proceed?', 'confirmAddressUpdate');




    } // end function











    // -----------------------------------------------------------











    #[On('confirmAddressUpdate')]
    public function confirmUpdate()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // :: validation



        // 1: getDeliveryDays
        $deliveryDays = array_filter($this->instance->deliveryDays ?? [], function ($value, $key) {

            return $value == true;

        }, ARRAY_FILTER_USE_BOTH);

        $deliveryDays = array_keys($deliveryDays ?? []);







        // 1.2: validation
        if (count($deliveryDays ?? []) == 0) {

            $this->makeAlert('info', 'Please select at least one delivery day');
            return false;

        } // end if









        // --------------------------------------
        // --------------------------------------










        // 2: checkUpcomingSubscription
        if ($this->address->customer->hasUpcomingSubscription()) {





            // 2.2: upcomingDeliveries
            $upcomingDeliveries = $this->address->customer?->currentSubscription()
                ?->deliveries?->where('deliveryDate', '>=', $this->getNextDate())?->count() ?? 0;







            // 2.3: checkConflict
            $isConflicted = $this->checkDeliveryDaysConflict($deliveryDays, $upcomingDeliveries, $this->getNextDate(), $this->address->customer->latestSubscription()->startDate);


            if ($isConflicted) {


                $this->makeAlert('info', 'Selected days are in conflict with the upcoming subscription deliveries');

                return false;

            } // end if



        } // end if










        // --------------------------------------
        // --------------------------------------








        // 3: makeRequest
        $response = $this->makeRequest('dashboard/customers/addresses/update', $this->instance);




        // 3.1: refreshByRedirect
        return $this->redirect(route('dashboard.singleCustomerAddresses',
            [$this->instance->customerId]) . "#tab-{$this->instance->id}", navigate: false);






    } // end function













    // -----------------------------------------------------------------









    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmAddressRemove');



    } // end function







    // -----------------------------------------------------------







    #[On('confirmAddressRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            $response = $this->makeRequest('dashboard/customers/addresses/remove', $this->removeId);



            // :: refreshPage
            return $this->redirect(route('dashboard.singleCustomerAddresses',
                [$this->instance->customerId]), navigate: false);





        } // end if





    } // end function













    // -----------------------------------------------------------











    public function render()
    {


        // 1: dependencies
        $cities = City::all();
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-addresses.components.single-customer-addresses-view', compact('cities', 'weekDays'));


    } // end function




} // end class


