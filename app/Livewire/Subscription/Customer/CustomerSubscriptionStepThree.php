<?php

namespace App\Livewire\Subscription\Customer;

use App\Livewire\Forms\CustomerSubscriptionForm;
use App\Models\Allergy;
use App\Models\Bag;
use App\Models\Exclude;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.subscription.customer')]
class CustomerSubscriptionStepThree extends Component
{


    use HelperTrait;




    // :: variables
    public CustomerSubscriptionForm $instance;
    public $plan;





    public function mount($id)
    {




        // :: checkSession - existing
        if (session('customer')?->{'isExistingCustomer'}) {


            // :: redirectBack
            return $this->redirect(route('subscription.customerStepOne'), navigate: true);



        } else {


            // :: checkSession
            if (session('customer') && session('customer')->{'planDays'})
                $this->instance = session('customer');
            else
                return $this->redirect(route('subscription.customerStepOne'), navigate: true);


        } // end if










        // :: limitFutureSession
        $this->instance->bag = null; // 4th
        $this->instance->deliveryDays = null; // 5th
        Session::put('customer', $this->instance);









        // --------------------------------------------
        // --------------------------------------------








        // 1: get instance
        $this->plan = Plan::find($id);






        // 1.2: defaultBag
        $bag = Bag::all()->first();
        $this->instance->bag = $bag->name;
        $this->instance->bagImageFile = $bag->imageFile;
        $this->instance->bagPrice = $bag->price;



    } // end function






    // --------------------------------------------------------------






    public function changeBag()
    {


        // 1: getBag - updateExisting
        $bag = Bag::where('name', $this->instance->bag)->first();


        $this->instance->bagImageFile = $bag->imageFile;
        $this->instance->bagPrice = $bag->price;




    } // end function







    // --------------------------------------------------------------









    public function continue()
    {



        // 1: makeSession
        Session::put('customer', $this->instance);







        // :: redirectStepFour
        return $this->redirect(route('subscription.customerStepFour', [$this->instance->planId]), navigate: true);



    } // end function











    // --------------------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $allergyLists = Allergy::all();
        $excludeLists = Exclude::all();
        $bags = Bag::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.subscription.customer.customer-subscription-step-three', compact('allergyLists', 'excludeLists', 'bags'));


    } // end function




} // end class

