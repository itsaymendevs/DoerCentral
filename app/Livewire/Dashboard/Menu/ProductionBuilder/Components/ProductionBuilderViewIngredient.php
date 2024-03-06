<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealItemDetailForm;
use App\Livewire\Forms\MealItemForm;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealDrink;
use App\Models\MealIngredient;
use App\Models\MealSauce;
use App\Models\MealSide;
use App\Models\MealSnack;
use App\Models\MealSubRecipe;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderViewIngredient extends Component
{



    use HelperTrait;



    // :: variables
    public MealItemDetailForm $instance;
    public $mealItem;


    // :: helpers
    public $removeId;
    public $id, $type;



    public function mount($id, $type)
    {

        // 1: get instance
        $this->id = $id;
        $this->type = $type;
        $this->init($id, $type);





        // :: initSelect
        $this->dispatch('initCertainSelect', class: '.ingredient--type-select');


    } // end function




    // ---------------------------------------------------







    #[On('refreshMealSizeIngredientsView-{id}-{type}')]
    public function init($id, $type)
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






        // 1: get id - meal - type - amount - remarks - isRemovable
        $this->instance->id = $id;
        $this->instance->type = $type;

        $this->instance->amount = $this->mealItem->amount;
        $this->instance->remarks = $this->mealItem->remarks;
        $this->instance->itemType = $this->mealItem->type;
        $this->instance->isRemovable = $this->mealItem->isRemovable;
        $this->instance->mealId = $this->mealItem->mealId;




    } // end function









    // -----------------------------------------------------








    public function update()
    {


        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/details/update', $this->instance);



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function





















    // -----------------------------------------------------






    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmMealItemRemove');






    } // end function







    // -----------------------------------------------------





    #[On('confirmMealItemRemove')]
    public function confirmRemove()
    {






    } // end function






    // -----------------------------------------------------------------






    public function reCalculateMacros()
    {


        // :: valid itemId
        if ($this->mealItem) {


            // 1: ingredient - sub-recipe - sauce - snack - side - drink
            $this->instance->calories = round($this->mealItem->totalMacro('Calories')
                * ($this->instance->amount ?? 0), 2);

            $this->instance->proteins = round($this->mealItem->totalMacro('Proteins')
                * ($this->instance->amount ?? 0), 2);

            $this->instance->carbs = round($this->mealItem->totalMacro('Carbs')
                * ($this->instance->amount ?? 0), 2);

            $this->instance->fats = round($this->mealItem->totalMacro('Fats')
                * ($this->instance->amount ?? 0), 2);

            $this->instance->grams = $this->instance->amount ?? 0;

        } // end if




    } // end function






    // -----------------------------------------------------------------













    public function render()
    {



        // 1: dependencies
        $this->reCalculateMacros();








        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-view-ingredient');


    } // end function


} // end class


