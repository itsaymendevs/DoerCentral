<?php

namespace App\Livewire\Dashboard\Menu\Plans\Manage;

use App\Models\MenuCalendarPlan;
use App\Models\Plan;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class Calendars extends Component
{

    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $id;






    public function mount($id)
    {

        // :: params
        $this->id = $id;

    } // end function








    // -----------------------------------------------------------------






    public function toggleDefault($id)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // 1: check if default exists
        $calendarPlan = MenuCalendarPlan::where('planId', $this->id)->where('isDefault', true)->first();



        // 1.2: makeDefault
        if (! $calendarPlan) {



            // ## log - activity ##
            $plan = Plan::find($this->id);

            $this->storeActivity('Menu', "Updated calendar for plan {$plan?->name}");





            // :: makeRequest
            $response = $this->makeRequest('dashboard/menu/plans/calendars/toggle-default', $id);

            $this->makeAlert('success', $response->message);




        } else {


            // 1.2: reportExistingCalendar
            $this->makeAlert('info', 'A default calendar already exists for this plan');

        } // end if





    } // end function













    // ------------------------------------------------------------------








    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $planCalendars = MenuCalendarPlan::where('planId', $this->id)->get();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.plans.manage.calendars', compact('planCalendars'));

    } // end function


} // end class
