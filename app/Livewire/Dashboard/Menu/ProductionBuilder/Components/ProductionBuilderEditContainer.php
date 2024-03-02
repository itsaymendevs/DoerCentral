<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Container;
use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderEditContainer extends Component
{


    use HelperTrait;



    // :: variables
    public $meal;
    public $container;





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
        $instance->container = $this->container;




        // :: notEmpty
        if ($this->container) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/containers/update', $instance);



            // :: resetSelect - updateInstance - render
            $this->meal = Meal::find($this->meal->id);

            $this->render();

        } // end if



    } // end function











    // -----------------------------------------------------










    public function render()
    {



        // 1: get Sizes -> notAssigned
        $containers = Container::all();
        $currentContainer = $this->meal?->containerId ? Container::find($this->meal->containerId) : null;



        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.menu.production-builder.components.production-builder-edit-container', compact('containers', 'currentContainer'));


    } // end function


} // end class

