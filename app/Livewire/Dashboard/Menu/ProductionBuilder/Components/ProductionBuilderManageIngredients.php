<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPartForm;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealPart;
use App\Models\MealSize;
use App\Models\Type;
use App\Models\VersionPermission;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageIngredients extends Component
{

    use HelperTrait;




    // :: variables
    public $meal;
    public MealPartForm $instance;
    public MealPartForm $instanceParts;





    public function mount($id)
    {


        // 1: getMeal - refreshMeal
        $this->refreshMeal($id);




        // --------------------------------------
        // --------------------------------------



        // 2: refreshInstance
        $this->refreshInstance();







    } // end function








    // -----------------------------------------------------







    #[On('refreshMealSizeIngredients')]
    public function refreshMeal($id)
    {

        $this->meal = Meal::find($id);


        // :: initSelect
        $this->dispatch('initCertainSelect', class: '.ingredient--select');
        $this->dispatch('initCertainSelect', class: '.ingredient--type-select');

        $this->dispatch('initCertainSelect', class: '.part--select');
        $this->dispatch('initCertainSelect', class: '.part--type-select');



    } // end function










    // ----------------------------------------------------










    public function refreshInstance()
    {




        // 1: prep SizeIngredients / Parts
        $mealSize = MealSize::where('mealId', $this->meal->id)->first();






        // 1.2: ingredients
        foreach ($mealSize->ingredients ?? [] as $mealIngredient) {



            // 1: get details
            $this->instance->partId[$mealIngredient->id] = $mealIngredient->ingredientId;

            $this->instance->id[$mealIngredient->id] = $mealIngredient->id;
            $this->instance->typeId[$mealIngredient->id] = 'Ingredient';
            $this->instance->partType[$mealIngredient->id] = $mealIngredient->partType; // * MIXED - MAIN - SIDE *
            $this->instance->mealId[$mealIngredient->id] = $mealIngredient->mealId;



        } // end loop






        // 1.2: parts
        foreach ($mealSize->parts ?? [] as $mealPart) {



            // 1: get details
            $this->instanceParts->partId[$mealPart->id] = $mealPart->partId;

            $this->instanceParts->id[$mealPart->id] = $mealPart->id;
            $this->instanceParts->typeId[$mealPart->id] = $mealPart->type->id;
            $this->instanceParts->partType[$mealPart->id] = $mealPart->partType; // * MIXED - MAIN - SIDE *
            $this->instanceParts->mealId[$mealPart->id] = $mealPart->mealId;



        } // end loop



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




            // 1.2: refresh-instance
            $this->refreshInstance();




            // 1.3: refresh-meal
            $this->dispatch('refreshMealSizeIngredients', $this->meal->id);





            // :: resetPage / openTab - redirectRoute - alert
            // return $this->redirect(route('dashboard.menuProductionBuilder', [$this->meal->id]) . '#tab-2', navigate: true);



        } // end if






    } // end function









    // -----------------------------------------------------









    public function updateAfterCookMacros($macroType, $value, $mealSizeId)
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
        $instance->macroType = $macroType;
        $instance->value = $value;
        $instance->mealSizeId = $mealSizeId;





        // :: notEmpty
        if ($macroType && $value && $mealSizeId) {


            // 1: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/macros/update', $instance);



            // :: render - alert
            // $this->makeAlert('success', $response->message);



        } // end if





    } // end function














    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------









    public function update($instanceId, $instanceType)
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // :: create instance - clone
        $instance = new stdClass();





        // 1: Ingredient
        if ($instanceType == 'Ingredient') {



            // :: get details
            $instance->partId = $this->instance->partId[$instanceId];

            $instance->id = $this->instance->id[$instanceId];
            $instance->typeId = $this->instance->typeId[$instanceId];
            $instance->partType = $this->instance->partType[$instanceId];
            $instance->mealId = $this->instance->mealId[$instanceId];



            // 2: Part
        } else {



            // :: get details
            $instance->partId = $this->instanceParts->partId[$instanceId];

            $instance->id = $this->instanceParts->id[$instanceId];
            $instance->typeId = $this->instanceParts->typeId[$instanceId];
            $instance->partType = $this->instanceParts->partType[$instanceId];
            $instance->mealId = $this->instanceParts->mealId[$instanceId];



        } // end if








        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $instance);











        // --------------------------
        // --------------------------






        // 1.2: refresh ingredient / part
        $this->dispatch('refreshMealSizeIngredientsView-' . $instance->id . '-' . $instance->typeId, $instance->id, $instance->typeId);
        $this->dispatch('recalculateMacros');




    } // end function












    // -----------------------------------------------------










    public function updateType($instanceId, $instanceType)
    {




        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: create instance - clone
        $instance = new stdClass();





        // 1: Ingredient
        if ($instanceType == 'Ingredient') {



            // :: get details
            $instance->partId = $this->instance->partId[$instanceId];

            $instance->id = $this->instance->id[$instanceId];
            $instance->typeId = $this->instance->typeId[$instanceId];
            $instance->partType = $this->instance->partType[$instanceId];
            $instance->mealId = $this->instance->mealId[$instanceId];



            // 2: Part
        } else {



            // :: get details
            $instance->partId = $this->instanceParts->partId[$instanceId];

            $instance->id = $this->instanceParts->id[$instanceId];
            $instance->typeId = $this->instanceParts->typeId[$instanceId];
            $instance->partType = $this->instanceParts->partType[$instanceId];
            $instance->mealId = $this->instanceParts->mealId[$instanceId];



        } // end if






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $instance);



        // :: alert
        // $this->makeAlert('success', $response->message);


    } // end function









    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------










    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::all();
        $versionPermission = VersionPermission::first();
        $mealSize = MealSize::where('mealId', $this->meal->id)->first();






        // 1.2: types


        // :: permission - hasExtraTypes
        if ($versionPermission->menuModuleHasBuilderExtraItems) {


            $types = Type::where('name', '!=', 'Recipe')->get();


        } else {


            $types = Type::whereNotIn('name', ['Recipe', 'Snack', 'Side', 'Drink'])->get();


        } // end if - permission








        // -----------------------------------------
        // -----------------------------------------









        // 1.2: mealOptions (withoutCurrent or inParts)
        $inPartsOfMeal = MealPart::where('partId', $this->meal->id)->get()
                ?->pluck('mealId')?->toArray() ?? [];

        $relationInPartsOfMeal = MealPart::whereIn('partId', $inPartsOfMeal)->get()
                ?->pluck('mealId')?->toArray() ?? [];




        $mealOptions = Meal::where('id', '!=', $this->meal->id)
            ->whereNotIn('id', $inPartsOfMeal)
            ->whereNotIn('id', $relationInPartsOfMeal)
            ->get();






        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-ingredients', compact('mealSize', 'types', 'ingredients', 'mealOptions'));




    } // end function


} // end class

