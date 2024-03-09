<?php

namespace App\Livewire\Dashboard\Menu\Calendars\SingleCalendar\Components;

use App\Livewire\Forms\MenuCalendarScheduleForm;
use App\Models\MealType;
use App\Models\MenuCalendarSchedule;
use App\Traits\HelperTrait;
use Livewire\Component;

class SingleCalendarEdit extends Component
{

    use HelperTrait;



    // :: variables
    public MenuCalendarScheduleForm $instance;





    public function mount($id)
    {




    } // end function



    // -----------------------------------------------------------








    public function update()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/calendars/schedules/update', $this->instance);





        // :: refresh - alert
        $this->dispatch('refreshViews');
        $this->makeAlert('success', $response->message);








    } // end function













    // -----------------------------------------------------------






    public function render()
    {


        // 1: dependencies
        $mealTypes = MealType::all();


        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.calendars.single-calendar.components.single-calendar-edit', compact('mealTypes'));


    } // end function


} // end class


