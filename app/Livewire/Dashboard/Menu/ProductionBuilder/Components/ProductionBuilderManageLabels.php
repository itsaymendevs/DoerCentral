<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Label;
use App\Models\Meal;
use App\Models\MealServing;
use App\Models\ServingItem;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageLabels extends Component
{



    use HelperTrait;



    // :: variables
    public $meal, $useCutlery, $cutleryPrice;
    public $label;





    public function mount($id)
    {

        // 1: get instance
        $this->meal = Meal::find($id);



        // 1.2: cutlery
        $this->cutleryPrice = ServingItem::first()->cutleryPrice ?? 0;
        $this->useCutlery = MealServing::where('mealId', $this->meal->id)->first()->useCutlery;



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






        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->label = $this->label;





        // :: notEmpty
        if ($instance->id) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/labels/update', $instance);



            // :: resetSelect - updateInstance - render
            $this->meal = Meal::find($this->meal->id);

            $this->render();

        } // end if



    } // end function









    // -----------------------------------------------------








    public function toggleCutlery()
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->meal->id;
        $instance->useCutlery = $this->useCutlery;







        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/cutlery/toggle', $instance);

        $this->render();




    } // end function






    // -----------------------------------------------------










    public function render()
    {



        // 1: dependencies
        $labels = Label::all();
        $currentLabel = $this->meal?->labelId ? Label::find($this->meal->labelId) : null;





        // :: initTooltips
        $this->dispatch('initTooltips');






        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-labels', compact('labels', 'currentLabel'));


    } // end function


} // end class
