<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Livewire\Forms\MenuCalendarCloneForm;
use App\Models\MenuCalendar;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class SingleCalendarClone extends Component
{

    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public MenuCalendarCloneForm $instance;





    public function mount($id)
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
        $this->instance->menuCalendarId = $calendar->id;

        $this->dispatch('refreshViews');
        $this->dispatch('closeModal', modal: '#clone-calendar .btn--close');
        $this->makeAlert('success', $response->message);






        // 1.3: runQUeue
        $this->dispatch('runQueue');




        return $this->redirect(route('dashboard.menuSingleCalendar', [$this->instance->menuCalendarId]) . '#tab-2', navigate: false);


    } // end function








    // ------------------------------------------------------------------







    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-clone');



    } // end function




} // end class
