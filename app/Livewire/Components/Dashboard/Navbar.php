<?php

namespace App\Livewire\Components\Dashboard;

use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {




        // 1: dependencies
        $user = User::find(session('userId'));


        return view('livewire.components.dashboard.navbar', compact('user'));


    } // end function


} // end class
