<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageInstructions extends Component
{


    use HelperTrait;



    // :: variables
    public $meal;
    public $instruction;





    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);



    } // end function







    // -----------------------------------------------------








    public function update()
    {


        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->instruction = $this->instruction;




        // :: notEmpty
        if ($this->instruction) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/instructions/store', $instance);



            // :: reset - render
            $this->instruction = null;


            $this->render();

        } // end if



    } // end function











    // -----------------------------------------------------










    public function render()
    {



        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-instructions');


    } // end function


} // end class
