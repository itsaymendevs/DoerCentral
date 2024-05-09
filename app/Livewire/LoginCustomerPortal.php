<?php

namespace App\Livewire;

use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;


#[Layout('livewire.layouts.portals.customer.login')]
class LoginCustomerPortal extends Component
{
    use LivewireAlert;
    use HelperTrait;


    // :: variables
    public $email, $password;




    public function checkCustomer()
    {



        // :: create instance
        $instance = new stdClass();

        $instance->email = $this->email;
        $instance->password = $this->password;





        // 1: makeRequest
        $response = $this->makeRequest('portals/customer/checkCustomer', $instance);




        // :: success
        if (! empty($response?->token)) {




            // 1.2: makeSessions
            Session::put('customerPortalToken', $response->token);
            Session::put('customerId', $response->customerId);
            Session::put('customerName', $response->customerName);


            return $this->redirect(route('portals.customer.home'), navigate: false);


        } // end if







        // :: incorrectCredentials
        $this->makeAlert('error', $response?->error);



    } // end function







    // ------------------------------------------------------





    public function render()
    {



        // :: removeSessions
        Session::forget(['customerPortalToken', 'customerId', 'customerName']);



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.login-customer-portal');



    } // end function



} // end class

