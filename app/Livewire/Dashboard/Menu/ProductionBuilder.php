<?php

namespace App\Livewire\Dashboard\Menu;

use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilder extends Component
{



    // :: variables
    public $meal;






    public function mount($id)
    {


        // :: params
        $this->meal = Meal::find($id);


    } // end function





    // ----------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {

        return view('livewire.dashboard.menu.production-builder');

    } // end function


} // end class
