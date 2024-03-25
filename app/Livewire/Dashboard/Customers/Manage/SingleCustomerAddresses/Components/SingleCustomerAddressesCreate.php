<?php

namespace App\Livewire\Dashboard\Customers\Manage\SingleCustomerAddresses\Components;

use App\Livewire\Forms\CustomerAddressForm;
use App\Models\City;
use App\Traits\HelperTrait;
use Livewire\Component;

class SingleCustomerAddressesCreate extends Component
{


    use HelperTrait;


    // :: variables
    public CustomerAddressForm $instance;







    public function mount($id)
    {


        // :: initiate - instance
        $this->initiate($id);



    } // end function








    // -----------------------------------------------------------






    public function initiate($id)
    {


        // :: reset
        $this->instance->reset();




        // 1: customer
        $this->instance->customerId = $id;




        // 1.2: deliveryDays - defaultValues
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        foreach ($weekDays as $weekDay)
            $this->instance->deliveryDays[$weekDay] = false;




    } // end function









    // -----------------------------------------------------------









    public function store()
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/customers/addresses/store', $this->instance);




        // :: refreshPage
        return $this->redirect(route('dashboard.singleCustomerAddresses', [$this->instance->customerId]), navigate: false);



    } // end function









    // -----------------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $cities = City::all();
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];



        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.customers.manage.single-customer-addresses.components.single-customer-addresses-create', compact('cities', 'weekDays'));


    } // end function




} // end class
