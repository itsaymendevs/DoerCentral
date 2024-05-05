<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayLabel\Components;

use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Label;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayLabelPreview extends Component
{



    // :: variables
    public $scheduleMeals;
    public $searchScheduleDate = '';






    #[On('labelPrint')]
    public function remount($scheduleMealsByMeal, $searchScheduleDate)
    {


        // :: params
        $this->searchScheduleDate = $searchScheduleDate;

        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])->get();





    } // end function







    // -----------------------------------------------------------





    public function render()
    {


        // 1: dependencies - temporary
        $label = Label::first();




        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-label.components.kitchen-today-label-preview', compact('label'));


    } // end function


} // end class
