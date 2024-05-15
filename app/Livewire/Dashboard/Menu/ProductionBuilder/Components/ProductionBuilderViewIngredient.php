<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPartDetailForm;
use App\Models\ConversionIngredient;
use App\Models\Meal;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderViewIngredient extends Component
{



    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public MealPartDetailForm $instance;
    public $mealPart;


    // :: helpers
    public $removeId;
    public $id, $typeId;







    public function mount($id, $typeId)
    {

        // 1: get instance
        $this->id = $id;
        $this->typeId = $typeId;
        $this->init($id, $typeId);





        // :: initSelect
        $this->dispatch('initCertainSelect', class: '.ingredient--type-select');


    } // end function








    // ---------------------------------------------------







    #[On('refreshMealSizeIngredientsView-{id}-{typeId}')]
    public function init($id, $typeId)
    {



        // :: ingredient / Part
        if ($typeId == 'Ingredient') {

            $this->mealPart = MealIngredient::find($id);
            $this->instance->partId = $this->mealPart->ingredientId;

        } else {


            $this->mealPart = MealPart::find($id);
            $this->instance->partId = $this->mealPart->partId;

        } // end if





        // 1: get id - meal - typeId - partType - amount - remarks - isRemovable - isReplacement
        $this->instance->id = $id;
        $this->instance->typeId = $typeId;

        $this->instance->amount = $this->mealPart->amount;
        $this->instance->remarks = $this->mealPart->remarks;
        $this->instance->partType = $this->mealPart->partType;
        $this->instance->isRemovable = $this->mealPart->isRemovable;
        $this->instance->isReplacement = $this->mealPart->isReplacement;
        $this->instance->groupToken = $this->mealPart->groupToken;
        $this->instance->mealId = $this->mealPart->mealId;
        $this->instance->mealSizeId = $this->mealPart->mealSizeId;
        $this->instance->cookingTypeId = $this->mealPart?->cookingTypeId ?? null;




        $this->render();

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




        // ## log - activity ##
        // $meal = Meal::find($this->instance->mealId);
        // $this->instance->typeId == 'Ingredient' ? $type = 'Ingredient' :
        //     $type = Type::find($this->instance->typeId)->name;


        // $this->storeActivity('Menu', "Updated {$type} details in {$meal->name}");








        // --------------------------------------------
        // --------------------------------------------





        // :: validAmount
        if (! empty($this->instance->amount)) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/details/update', $this->instance);


        } // end if


    } // end function











    // -----------------------------------------------------








    public function remove($id)
    {



        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmMealPartRemove');






    } // end function







    // -----------------------------------------------------





    #[On('confirmMealPartRemove')]
    public function confirmRemove()
    {



        // :: create instance
        $instance = new stdClass();
        $instance->id = $this->removeId;
        $instance->typeId = $this->instance->typeId;



        // 1: remove
        if ($this->removeId) {



            // ## log - activity ##
            // $meal = Meal::find($this->instance->mealId);
            // $this->instance->typeId == 'Ingredient' ? $type = 'Ingredient' :
            //     $type = Type::find($this->instance->typeId)->name;


            // $this->storeActivity('Menu', "Removed {$type} from {$meal->name}");





            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/remove', $instance);
            $this->makeAlert('info', $response->message);


        } // end if





        // 1.2: renderParent
        $this->dispatch('refreshMealSizeIngredients', $this->instance->mealId);






    } // end function






    // -----------------------------------------------------------------






    public function reCalculateMacros()
    {


        // :: valid partId
        if ($this->mealPart) {




            // 1: getTotalMacros
            $totalMacros = $this->mealPart->totalMacro($this->instance->amount ?? 0);




            // 1.2: ingredient - sub-recipe - sauce - snack - side - drink
            $this->instance->calories = $this->instance->afterCookCalories = $totalMacros->calories;
            $this->instance->proteins = $this->instance->afterCookProteins = $totalMacros->proteins;
            $this->instance->carbs = $this->instance->afterCookCarbs = $totalMacros->carbs;
            $this->instance->fats = $this->instance->afterCookFats = $totalMacros->fats;
            $this->instance->grams = $this->instance->afterCookGrams = $this->instance->amount ?? 0;






            // -----------------------------------------------
            // -----------------------------------------------







            // 1.3: afterCookGrams
            if ($this->instance->typeId == 'Ingredient' && ! empty($this->instance->partId) && ! empty($this->instance->cookingTypeId)) {


                // :: get conversionValue
                $conversion = ConversionIngredient::where('ingredientId', $this->instance->partId)
                    ->where('cookingTypeId', $this->instance->cookingTypeId)?->first();


                if ($conversion) {

                    // 1.4: updateAfterCook Macros
                    $this->instance->afterCookGrams *= $conversion->conversionValue;

                    $totalMacros = $this->mealPart->totalMacro($this->instance->afterCookGrams ?? 0);

                    $this->instance->afterCookCalories = $totalMacros->calories;
                    $this->instance->afterCookProteins = $totalMacros->proteins;
                    $this->instance->afterCookCarbs = $totalMacros->carbs;
                    $this->instance->afterCookFats = $totalMacros->fats;


                } // end if - exists


            } // end if - checkConversion





        } // end if - partExists







    } // end function






    // -----------------------------------------------------------------













    public function render()
    {



        // 1: dependencies
        if (! empty($this->instance->amount)) {

            $this->reCalculateMacros();
            $this->dispatch('reCalculateTotalMacros', id: "#ingredient--grams-input-{$this->instance->typeId}-{$this->instance->id}");


        } // end if





        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-view-ingredient');


    } // end function


} // end class


