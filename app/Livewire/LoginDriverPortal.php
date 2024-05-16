<?php

namespace App\Livewire;

use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;



#[Layout('livewire.layouts.portals.driver.login')]
class LoginDriverPortal extends Component
{


    use LivewireAlert;
    use HelperTrait;


    // :: variables
    public $email, $password;




    public function checkDriver()
    {



        // :: create instance
        $instance = new stdClass();

        $instance->email = $this->email;
        $instance->password = $this->password;





        // 1: makeRequest
        $response = $this->makeRequest('portals/driver/checkDriver', $instance);




        // :: success
        if (! empty($response?->token)) {




            // 1.2: makeSessions
            Session::put('driverPortalToken', $response->token);
            Session::put('driverId', $response->driverId);
            Session::put('driverName', $response->driverName);


            return $this->redirect(route('portals.driver.home'), navigate: false);


        } // end if







        // :: incorrectCredentials
        $this->makeAlert('error', $response?->error);



    } // end function







    // ------------------------------------------------------





    public function render()
    {



        // :: removeSessions
        Session::forget(['driverPortalToken', 'driverId', 'driverName']);



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.login-driver-portal');



    } // end function



} // end class
