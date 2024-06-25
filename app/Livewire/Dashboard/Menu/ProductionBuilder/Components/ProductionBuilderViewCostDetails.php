<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\MealSize;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderViewCostDetails extends Component
{


    // :: variables
    public $mealSize, $combine;





    #[On('viewCostDetails')]
    public function mount($id = null)
    {


        // 1: get instance
        $this->mealSize = MealSize::find($id);
        $this->combine = $this->mealSize?->costPriceDetails();


    } // end function








    // -----------------------------------------------------







    public function render()
    {

        return view('livewire.dashboard.menu.production-builder.components.production-builder-view-cost-details');

    } // end function



} // end class
