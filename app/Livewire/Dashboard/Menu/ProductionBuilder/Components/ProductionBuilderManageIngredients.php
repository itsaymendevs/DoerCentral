<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Container;
use App\Models\Meal;
use App\Models\Size;
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


        // 1: dependencies
        $sizes = Size::all();
        $containers = Container::all();





        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-ingredients', compact('sizes', 'containers'));


    } // end function


} // end class
