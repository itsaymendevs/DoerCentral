<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealSizeForm;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealDrink;
use App\Models\MealSauce;
use App\Models\MealSide;
use App\Models\MealSize;
use App\Models\MealSnack;
use App\Models\MealSubRecipe;
use App\Models\Type;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageIngredients extends Component
{

    use HelperTrait;




    // :: variables
    public $meal;






    public function mount($id)
    {

        // 1: get instance
        $this->refreshInstance($id);


    } // end function





    // -----------------------------------------------------




    #[On('refreshMealSizeIngredients')]
    public function refreshInstance($id)
    {


        $this->meal = Meal::find($id);


    } // end function









    // -----------------------------------------------------




    public function append($typeId)
    {



        // :: create instance
        $instance = new stdClass();
        $instance->mealId = $this->meal?->id;
        $instance->typeId = $typeId;





        // :: notEmpty
        if ($typeId) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/store', $instance);




            // :: resetPage / openTab - redirectRoute - alert
            return $this->redirect(route('dashboard.menuProductionBuilder', [$this->meal->id]) . '#tab-2', navigate: true);



        } // end if






    } // end function






    // -----------------------------------------------------





    public function updateAfterCookMacros($macroType, $value, $mealSizeId)
    {





        // :: create instance
        $instance = new stdClass();
        $instance->macroType = $macroType;
        $instance->value = $value;
        $instance->mealSizeId = $mealSizeId;





        // :: notEmpty
        if ($macroType && $value && $mealSizeId) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/macros/update', $instance);



            // :: render - alert
            $this->makeAlert('success', $response->message);



        } // end if





    } // end function








    // -----------------------------------------------------









    public function render()
    {


        // 1: dependencies
        $types = Type::where('name', '!=', 'Recipe')->get();
        $mealSize = MealSize::where('mealId', $this->meal->id)->first();



        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-ingredients', compact('mealSize', 'types'));


    } // end function


} // end class

