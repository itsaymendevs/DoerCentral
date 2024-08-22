<?php

namespace App\Livewire\Dashboard;

use App\Models\ClientLead;
use Livewire\Component;

class Brands extends Component
{
    public function render()
    {

        // 1: clients
        $clients = ClientLead::all();



        dd($clients);

        return view('livewire.dashboard.brands', compact('clients'));


    } // end function




} // end class
