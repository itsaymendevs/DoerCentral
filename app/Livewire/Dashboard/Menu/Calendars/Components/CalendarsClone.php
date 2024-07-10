<?php

namespace App\Livewire\Dashboard\Menu\Calendars\Components;

use App\Livewire\Forms\MenuCalendarCloneForm;
use App\Models\MenuCalendar;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CalendarsClone extends Component
{


    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public MenuCalendarCloneForm $instance;





    #[On('cloneCalendar')]
    public function remount($id)
    {



        // 1: get instance
        $this->instance->reset();
        $this->instance->menuCalendarId = $id;





    } // end function









    // ------------------------------------------------------------------






    public function clone()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: validate
        $this->instance->validate();





        // ## log - activity ##
        $calendar = MenuCalendar::find($this->instance->menuCalendarId);
        $this->storeActivity('Menu', "Cloned calendar {$calendar->name}");




        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/calendars/clone', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#clone-calendar .btn--close');

        $this->makeAlert('success', $response->message);




    } // end function








    // ------------------------------------------------------------------







    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.calendars.components.calendars-clone');



    } // end function




} // end class
