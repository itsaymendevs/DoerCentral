<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Models\Size;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageSizesOverview extends Component
{


    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public $meal;




    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);




    } // end function







    // -----------------------------------------------------








    public function viewCostDetails($id)
    {

        // 1: dispatchEvent
        $this->dispatch('viewCostDetails', $id);



    } // end function








    // -----------------------------------------------------








    public function updatePrice($mealSizeId, $price)
    {



        // :: validation
        if ($mealSizeId) {




            // 1: make instance
            $instance = new stdClass();
            $instance->id = $mealSizeId;
            $instance->price = $price;





            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/sizes/price/update', $instance);


        } // end if




    } // end function








    // -----------------------------------------------------










    #[On('refreshSizeViews')]
    public function render()
    {




        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-sizes-overview');




    } // end function





} // end class
