<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerAddresses\Components;

use App\Livewire\Forms\CustomerAddressForm;
use App\Livewire\Forms\CustomerForm;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\CustomerDeliveryDay;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerAddressesView extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerAddressForm $instance;
    public $address, $removeId;









    public function mount($id)
    {


        // 1: getCustomerAddress
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



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/addresses/update', $this->instance);



        // 1.2: refreshByRedirect
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
        $reservedWeekDays = CustomerDeliveryDay::where('customerId', $this->instance->customerId)
                ?->where('customerAddressId', '!=', $this->address->id)
                ?->pluck('weekDay')->toArray() ?? [];





        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-addresses.components.single-customer-addresses-view', compact('cities', 'weekDays', 'reservedWeekDays'));


    } // end function




} // end class


