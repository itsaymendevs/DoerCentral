<?php

namespace App\Livewire\Dashboard\Menu\Calendars;

use Livewire\Component;

class SingleCalendar extends Component
{



    // :: variables
    public $id;



    public function mount($id)
    {


        // :: params
        $this->id = $id;


    } // end function






    // -----------------------------------------------------------








    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');

        return view('livewire.dashboard.menu.calendars.single-calendar');


    } // end function





} // end class
