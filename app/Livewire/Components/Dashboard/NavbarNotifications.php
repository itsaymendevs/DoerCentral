<?php

namespace App\Livewire\Components\Dashboard;

use App\Models\Notification;
use App\Traits\HelperTrait;
use Livewire\Component;

class NavbarNotifications extends Component
{


    use HelperTrait;




    public function render()
    {

        return view('livewire.components.dashboard.navbar-notifications');

    } // end function


} // end class
