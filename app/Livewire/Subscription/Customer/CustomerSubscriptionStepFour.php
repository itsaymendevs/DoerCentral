<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Allergy;
use App\Models\City;
use App\Models\CityDistrict;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepFour extends Component
{



    use HelperTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;
    public $plan;





    public function mount($id)
    {


        // :: checkSession
        session('customer') && session('customer')->{'bag'} ?
            $this->instance = session('customer') :
            $this->redirect(route('subscription.customerStepOne'), navigate: true);





        // 1: get instance
        $this->plan = Plan::find($id);






        // 2: deliveryDays - defaultValues
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        foreach ($weekDays as $weekDay)
            $this->instance->deliveryDays[$weekDay] = false;


    } // end function










    // --------------------------------------------------------------









    public function continue()
    {




        // :: validation
        $counter = 0;


        // 1: check - deliveryDays
        foreach ($this->instance->deliveryDays as $deliveryDay => $isChecked)
            boolval($isChecked) ? $counter++ : null;




        // 1.2: checkDeliveryDaysLimit
        if ($counter < 3) {

            $this->makeAlert('info', 'Please select at least 3 delivery days');
            return false;

        } // end if







        // -----------------------
        // -----------------------



        // :: continue




        // 1: makeSession
        Session::put('customer', $this->instance);



        // :: redirectStepFive
        return $this->redirect(route('subscription.customerStepFive', [$this->instance->planId]), navigate: true);





    } // end function











    // --------------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $cities = City::all();








        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-four', compact('weekDays', 'cities'));


    } // end function




} // end class
