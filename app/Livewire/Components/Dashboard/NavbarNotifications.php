<?php

namespace App\Livewire\Components\Dashboard;

use App\Models\Notification;
use App\Traits\HelperTrait;
use Livewire\Component;

class NavbarNotifications extends Component
{


    use HelperTrait;





    public function markAsPreviewed()
    {



        // 1: makeRequest
        $this->makeRequest('dashboard/notifications/update', []);




    } // end function







    // -----------------------------------------------------------








    public function rerender()
    {



        $this->render();


    } // end function











    // -----------------------------------------------------------










    public function render()
    {



        // 1: dependencies
        $notifications = Notification::where('isForDashboard', true)
            ->orderBy('created_at', 'desc')
            ->get();


        $unPreviewedCount = Notification::where('isPreviewed', false)
            ->where('isForDashboard', true)
            ->count();




        return view('livewire.components.dashboard.navbar-notifications', compact('notifications', 'unPreviewedCount'));




    } // end function


} // end class
