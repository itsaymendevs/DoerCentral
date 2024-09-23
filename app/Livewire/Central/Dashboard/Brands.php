<?php

namespace App\Livewire\Central\Dashboard;

use App\Models\ClientLead;
use Livewire\Component;

class Brands extends Component
{


    // :: variables
    public $searchStatus = '', $searchBrand = '';



    public function render()
    {

        // 1: dependencies
        $statuses = ['active', 'rejected', 'pending', 'processing'];


        $brands = ClientLead::where('name', 'LIKE', "%{$this->searchBrand}%")
            ->where('status', 'LIKE', "%{$this->searchStatus}%")
            ->get();




        return view('livewire.central.dashboard.brands', compact('brands', 'statuses'));


    } // end function




} // end class
