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
    public $meal, $container;





    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);



    } // end function







    // -----------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->container = $this->container;





        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/containers/update', $instance);



        // 1.3: quickRefresh
        $this->meal = Meal::find($this->meal->id);
        $this->render();







    } // end function











    // -----------------------------------------------------










    public function render()
    {



        // 1: dependencies
        $containers = Container::all();
        $currentContainer = $this->meal?->containerId ? Container::find($this->meal->containerId) : null;





        return view('livewire.dashboard.menu.production-builder.components.production-builder-edit-container', compact('containers', 'currentContainer'));


    } // end function





} // end class
