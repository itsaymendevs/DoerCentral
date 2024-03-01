<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageIngredients extends Component
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


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-ingredients');


    } // end function


} // end class
