<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use stdClass;


#[Layout('livewire.layouts.login')]
class Login extends Component
{

    use LivewireAlert;
    use HelperTrait;


    // :: variables
    public $email, $password;




    public function checkUser()
    {



        // :: create instance
        $instance = new stdClass();

        $instance->email = $this->email;
        $instance->password = $this->password;





        // 1: makeRequest
        $response = $this->makeRequest('checkUser', $instance);




        // :: success
        if (! empty($response?->token)) {



            // 1.3: getGlobalUser
            $user = User::find($response->userId);




            // 1.2: makeSessions
            Session::put('token', $response->token);
            Session::put('userId', $response->userId);
            Session::put('userName', $response->userName);
            Session::put('globalUser', $user);












            // ----------------------------
            // ----------------------------






            // 1.4: determine APP_TYPE

            if (env('APP_TYPE') == 'CLIENT' || env('APP_TYPE') == 'BOTH')
                return $this->redirect(route('dashboard.menuPlans'), navigate: false);
            else
                return $this->redirect(route('dashboard.control.permissions'), navigate: false);




        } // end if







        // :: incorrectCredentials
        $this->makeAlert('error', $response?->error);



    } // end function







    // ------------------------------------------------------





    public function render()
    {



        // :: removeSessions
        Session::forget(['token', 'userId', 'userName', 'globalUser']);

        return view('livewire.login');

    } // end function



} // end class
