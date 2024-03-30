<?php

namespace App\Livewire\CustomerPortal\CustomerAddresses\Components;

use App\Livewire\Forms\CustomerAddressForm;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\CustomerDeliveryDay;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerAddressesView extends Component
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
        return $this->redirect(route('portals.customer.address', [$this->instance->customerId]) . "#tab-{$this->instance->id}", navigate: false);

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
            return $this->redirect(route('portals.customer.address', [$this->instance->customerId]), navigate: false);





        } // end if





    } // end function x













    // -----------------------------------------------------------











    public function render()
    {


        // 1: dependencies
        $cities = City::all();
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.customer-portal.customer-addresses.components.customer-addresses-view', compact('cities', 'weekDays'));


    } // end function




} // end class
