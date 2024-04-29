<?php

namespace App\Livewire\Dashboard\ManageKitchen\KitchenToday\KitchenTodayLabel\Components;

use App\Models\CustomerSubscriptionScheduleMeal;
use App\Models\Label;
use Livewire\Attributes\On;
use Livewire\Component;

class KitchenTodayLabelPrint extends Component
{



    // :: variables
    public $scheduleMeals;







    #[On('labelPrint')]
    public function remount($scheduleMealsByMeal)
    {


        // :: params
        $this->scheduleMeals = CustomerSubscriptionScheduleMeal::whereIn('id', collect($scheduleMealsByMeal)?->pluck('id')?->toArray() ?? [])->get();





    } // end function







    // -----------------------------------------------------------





    public function render()
    {


        // 1: dependencies - temporary
        $label = Label::first();




        return view('livewire.dashboard.manage-kitchen.kitchen-today.kitchen-today-label.components.kitchen-today-label-print', compact('label'));


    } // end function


} // end class
