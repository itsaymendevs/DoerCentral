<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerAddresses\Components;

use App\Livewire\Forms\CustomerAddressForm;
use App\Livewire\Forms\CustomerForm;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleCustomerAddressesView extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerAddressForm $instance;
    public $address;






    public function mount($id)
    {


        // :: getCustomerAddress
        $this->address = CustomerAddress::find($id);




        // :: initiate
        foreach ($this->address->toArray() as $key => $value)
            $this->instance->{$key} = $value;









    } // end function









    // ----------------------------------------------------------








    public function setChildSelect($id)
    {



        // :: setChildSelect

        // 1: district
        if (str_contains($id, 'district'))
            $this->dispatch('setSelect', id: $id, value: $this->instance->cityDistrictId ?? null);



        // 2: deliveryTime
        if (str_contains($id, 'deliveryTime'))
            $this->dispatch('setSelect', id: $id, value: $this->instance->deliveryTimeId ?? null);





    } // end function










    // -----------------------------------------------------------







    public function update()
    {





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/addresses/update', $this->instance);



        // 1.2: alert
        $this->makeAlert('success', $response?->message);


    } // end function









    // -----------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $cities = City::all();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.customers.manage.single-customer-addresses.components.single-customer-addresses-view', compact('cities'));


    } // end function




} // end class


