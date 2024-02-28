<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('livewire.layouts.login')]
class Login extends Component
{

    use LivewireAlert;

    public $email, $password;




    public function checkUser()
    {



    } // end function







    // ------------------------------------------------------





    public function render()
    {
        return view('livewire.login');

    } // end function



} // end class
