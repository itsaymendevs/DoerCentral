<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealServingForm;
use App\Models\MealServing;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageServings extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public MealServingForm $instance;








    public function mount($id)
    {



        // 1: get instance
        $serving = MealServing::where('mealId', $id)->first();

        foreach ($serving->toArray() as $key => $value)
            $this->instance->{$key} = $value;






    } // end function









    // -----------------------------------------------------










    public function updateServing()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/servings/update', $this->instance);

        $this->makeAlert('success', $response->message);




    } // end function









    // -----------------------------------------------------








    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-servings');


    } // end function





} // end class
