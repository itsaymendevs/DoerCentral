<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Label;
use App\Models\Meal;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderEditLabel extends Component
{


    use HelperTrait;



    // :: variables
    public $meal, $label;





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
        $instance->label = $this->label;



        if ($instance->id) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/labels/update', $instance);



            // 1.2: quickRefresh
            $this->meal = Meal::find($this->meal->id);

            $this->render();


        } // end if





    } // end function










    // -----------------------------------------------------










    public function render()
    {



        // 1: dependencies
        $labels = Label::all();
        $currentLabel = $this->meal?->labelId ? Label::find($this->meal->labelId) : null;





        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.menu.production-builder.components.production-builder-edit-label', compact('labels', 'currentLabel'));


    } // end function





} // end class
