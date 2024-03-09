<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPartForm;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealDrink;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\MealSauce;
use App\Models\MealSide;
use App\Models\MealSize;
use App\Models\MealSnack;
use App\Models\MealSubRecipe;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderEditIngredient extends Component
{


    use HelperTrait;




    // :: variables
    public MealPartForm $instance;
    public $mealPart;






    public function mount($id, $typeId)
    {




        // :: determineTypeId
        if ($typeId == 'Ingredient') {

            $this->mealPart = MealIngredient::find($id);
            $this->instance->partId = $this->mealPart->ingredientId;

        } else {

            $this->mealPart = MealPart::find($id);
            $this->instance->partId = $this->mealPart->partId;

        } // end if







        // 1: get details
        $this->instance->id = $id;
        $this->instance->typeId = $typeId;
        $this->instance->partType = $this->mealPart->partType; // * MIXED - MAIN - SIDE
        $this->instance->mealId = $this->mealPart->mealId;





        // :: initSelect
        $this->dispatch('initCertainSelect', class: '.ingredient--select');
        $this->dispatch('initCertainSelect', class: '.ingredient--type-select');



    } // end function









    // -----------------------------------------------------






    public function update()
    {


        // :: validation
        $this->instance->validate();




        // 1: makeRequest - alert
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $this->instance);

        $this->makeAlert('success', $response->message);





        // --------------------------
        // --------------------------






        // 1.2: refresh ingredient-details
        $mealIngredients = MealIngredient::where('mealId', $this->instance->mealId)->get();

        foreach ($mealIngredients as $mealIngredient) {

            $this->dispatch('refreshMealSizeIngredientsView-' . $mealIngredient->id . '-' . $this->instance->typeId, $mealIngredient->id, $this->instance->typeId);

        } // end loop







        // 1.3: refresh part-details
        $mealParts = MealPart::where('mealId', $this->instance->mealId)->get();

        foreach ($mealParts as $mealPart) {

            $this->dispatch('refreshMealSizeIngredientsView-' . $mealPart->id . '-' . $this->instance->typeId, $mealPart->id, $this->instance->typeId);

        } // end loop







    } // end function












    // -----------------------------------------------------







    public function updateType()
    {





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $this->instance);



        // :: alert
        $this->makeAlert('success', $response->message);


    } // end function










    // -----------------------------------------------------------------










    #[On('refreshParts')]
    public function render()
    {


        // 1: ingredient / parts
        $parts = $this->instance?->typeId != 'Ingredient' ?
            Meal::where('id', '!=', $this->instance->mealId)
                ->where('typeId', $this->instance->typeId)->get() : Ingredient::all();










        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-edit-ingredient', compact('parts'));


    } // end function


} // end class
