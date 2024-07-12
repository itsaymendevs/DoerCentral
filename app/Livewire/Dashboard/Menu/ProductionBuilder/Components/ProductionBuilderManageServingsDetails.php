<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Models\Meal;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;


class ProductionBuilderManageServingsDetails extends Component
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









    public function update($key, $value, $mealSizeId)
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
        $instance->id = $mealSizeId;
        $instance->key = $key;
        $instance->value = $value ?? null;








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/sizes/servings/update', $instance);








    } // end function








    // -----------------------------------------------------





    public function render()
    {

        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-servings-details');


    } // end function






} // end class
