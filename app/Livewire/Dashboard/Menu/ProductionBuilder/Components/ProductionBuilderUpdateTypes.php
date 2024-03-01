<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderUpdateTypes extends Component
{



    // :: variables
    public $meal;





    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);




    } // end function







    // -----------------------------------------------------









    #[On('refreshViews')]
    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-update-types');


    } // end function


} // end class
