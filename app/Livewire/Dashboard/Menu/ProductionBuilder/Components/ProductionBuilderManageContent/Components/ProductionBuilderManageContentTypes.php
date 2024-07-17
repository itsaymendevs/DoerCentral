<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\Meal;
use App\Models\Type;
use App\Models\VersionPermission;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageContentTypes extends Component
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








    public function append($id)
    {




        // 1: dispatchEvent
        $this->dispatch('createBuilderItem', $id);
        $this->dispatch('no-events', class: '.item--append', delay: 2000);



    } // end function









    // -----------------------------------------------------








    public function render()
    {


        // 1: dependencies
        $versionPermission = VersionPermission::first();





        // 1.2: types
        if ($versionPermission->menuModuleHasBuilderExtraItems) {

            $types = Type::where('name', '!=', 'Recipe')->get();

        } else {

            $types = Type::whereNotIn('name', ['Recipe', 'Snack', 'Side', 'Drink'])->get();

        } // end if - permission








        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-types', compact('types'));




    } // end function





} // end class
