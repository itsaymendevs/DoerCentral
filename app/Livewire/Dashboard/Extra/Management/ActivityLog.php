<?php

namespace App\Livewire\Dashboard\Extra\Management;

use App\Traits\HelperTrait;
use Livewire\Component;
use App\Models\ActivityLog as Log;




class ActivityLog extends Component
{

    use HelperTrait;



    // :: variables
    public $searchUser = '';






    public function render()
    {


        // 1: dependencies
        $logs = Log::orderBy('dateTime', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchUser . '%')->paginate(200);


        return view('livewire.dashboard.extra.management.activity-log', compact('logs'));


    } // end function



} // end class
