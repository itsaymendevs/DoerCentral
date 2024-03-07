<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealItemForm;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealDrink;
use App\Models\MealIngredient;
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
    public MealItemForm $instance;
    public $mealItem;






    public function mount($id, $type)
    {




        // :: determineType
        if ($type == 'Ingredient') {

            $this->mealItem = MealIngredient::find($id);
            $this->instance->itemId = $this->mealItem->ingredientId;

        } // end if


        if ($type == 'Sub-recipe') {

            $this->mealItem = MealSubRecipe::find($id);
            $this->instance->itemId = $this->mealItem->subRecipeId;

        } // end if



        if ($type == 'Snack') {

            $this->mealItem = MealSnack::find($id);
            $this->instance->itemId = $this->mealItem->snackId;

        } // end if



        if ($type == 'Sauce') {

            $this->mealItem = MealSauce::find($id);
            $this->instance->itemId = $this->mealItem->sauceId;

        } // end if



        if ($type == 'Side') {

            $this->mealItem = MealSide::find($id);
            $this->instance->itemId = $this->mealItem->sideId;


        } // end if


        if ($type == 'Drink') {

            $this->mealItem = MealDrink::find($id);
            $this->instance->itemId = $this->mealItem->drinkId;

        } // end if







        // 1: get id - meal - type
        $this->instance->id = $id;
        $this->instance->type = $type;
        $this->instance->itemType = $this->mealItem->type;
        $this->instance->mealId = $this->mealItem->mealId;





        // :: initSelect
        $this->dispatch('initCertainSelect', class: '.ingredient--select');
        $this->dispatch('initCertainSelect', class: '.ingredient--type-select');



    } // end function









    // -----------------------------------------------------






    public function update()
    {


        // :: validation
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $this->instance);





        // 1.2: refresh ingredientDetails related
        $mealIngredients = MealIngredient::where('mealId', $this->instance->mealId)->get();

        foreach ($mealIngredients as $mealIngredient) {

            $this->dispatch('refreshMealSizeIngredientsView-' . $mealIngredient->id . '-' . $this->instance->type, $mealIngredient->id, $this->instance->type);

        } // end loop





        // :: alert
        $this->makeAlert('success', $response->message);




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










    #[On('refreshItems')]
    public function render()
    {


        // 1: ingredient / meal
        $items = $this->instance?->type != 'Ingredient' ?
            Meal::where('id', '!=', $this->instance->mealId)
                ->where('type', $this->instance->type)->get() : Ingredient::all();










        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-edit-ingredient', compact('items'));


    } // end function


} // end class
