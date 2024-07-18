<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\BuilderMealForm;
use App\Livewire\Forms\BuilderMealOptionForm;
use App\Models\ConversionIngredient;
use App\Models\CookingType;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
use App\Models\Meal;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\Type;
use App\Models\VersionPermission;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageContent extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $mealPart, $mealPartForIngredient;
    public $versionPermission, $ingredients, $cookingTypes, $mealOptions;
    public $meal, $itemTypes, $appendCounter = 10000;
    public BuilderMealOptionForm $instanceOptions;
    public BuilderMealForm $instance;
    public BuilderMealForm $instanceUnique;










    public function mount($id)
    {




        // 1: dependencies
        $this->meal = Meal::find($id);
        $this->ingredients = Ingredient::all();
        $this->cookingTypes = CookingType::all();






        // 1.2: itemTypes
        $this->versionPermission = VersionPermission::first();

        if ($this->versionPermission->menuModuleHasBuilderExtraItems) {

            $this->itemTypes = Type::where('name', '!=', 'Recipe')->get();

        } else {

            $this->itemTypes = Type::whereNotIn('name', ['Recipe', 'Snack', 'Side', 'Drink'])->get();

        } // end if - permission










        // 1.3: parts
        $inPartsOfMeal = MealPart::where('partId', $this->meal->id)->get()
                ?->pluck('mealId')?->toArray() ?? [];

        $relationInPartsOfMeal = MealPart::whereIn('partId', $inPartsOfMeal)->get()
                ?->pluck('mealId')?->toArray() ?? [];




        $this->mealOptions = Meal::where('id', '!=', $this->meal->id)
            ->whereNotIn('id', $inPartsOfMeal)
            ->whereNotIn('id', $relationInPartsOfMeal)
            ->get();











        // --------------------------------------------
        // --------------------------------------------







        // 2: calcPart
        $this->mealPart = new MealPart();
        $this->mealPart->mealId = $this->meal->id;





        // 2.5: forIngredient
        $this->mealPartForIngredient = new MealIngredient();
        $this->mealPartForIngredient->mealId = $this->meal->id;








        // ----------------------------------------------------
        // ----------------------------------------------------







        // 3: numberOfSizes
        $this->instance->numberOfSizes = $this->meal->sizes()->count();
        $this->instanceUnique->numberOfSizes = $this->meal->sizes()->count();









        // 1.2: ingredients
        foreach ($this->meal?->ingredients?->groupBy('groupToken') ?? [] as $commonToken => $mealIngredients) {




            // A: withoutDuplicates
            $mealIngredient = $mealIngredients->first();




            // 1.3: general
            array_push($this->instanceUnique->type, 'Ingredient');

            array_push($this->instanceUnique->typeId, 'Ingredient');
            array_push($this->instanceUnique->typeName, 'ingredient');


            array_push($this->instanceUnique->id, $mealIngredient?->id);
            array_push($this->instanceUnique->partId, $mealIngredient?->ingredientId);
            array_push($this->instanceUnique->partBrandId, $mealIngredient?->ingredientBrandId);

            array_push($this->instanceUnique->cookingTypeId, $mealIngredient?->cookingTypeId);
            array_push($this->instanceUnique->partType, $mealIngredient?->partType);
            array_push($this->instanceUnique->amount, $mealIngredient?->amount);
            array_push($this->instanceUnique->remarks, $mealIngredient?->remarks);
            array_push($this->instanceUnique->groupToken, $mealIngredient?->groupToken);
            array_push($this->instanceUnique->isRemovable, boolval($mealIngredient?->isRemovable));
            array_push($this->instanceUnique->isDefault, $mealIngredient?->isDefault);
            array_push($this->instanceUnique->mealId, $mealIngredient?->mealId);
            array_push($this->instanceUnique->mealSizeId, $mealIngredient?->mealSizeId);
            array_push($this->instanceUnique->isRemoved, false);




            // 1.4: macros
            array_push($this->instanceUnique->grams, 0);
            array_push($this->instanceUnique->calories, 0);
            array_push($this->instanceUnique->proteins, 0);
            array_push($this->instanceUnique->carbs, 0);
            array_push($this->instanceUnique->fats, 0);
            array_push($this->instanceUnique->cost, 0);

            array_push($this->instanceUnique->afterCookGrams, 0);
            array_push($this->instanceUnique->afterCookCalories, 0);
            array_push($this->instanceUnique->afterCookProteins, 0);
            array_push($this->instanceUnique->afterCookCarbs, 0);
            array_push($this->instanceUnique->afterCookFats, 0);
            array_push($this->instanceUnique->afterCookCost, 0);









            // B: withDuplicates
            foreach ($mealIngredients as $key => $mealIngredient) {




                // 1.3: general
                array_push($this->instance->type, 'Ingredient');

                array_push($this->instance->typeId, 'Ingredient');
                array_push($this->instance->typeName, 'ingredient');



                array_push($this->instance->id, $mealIngredient?->id);
                array_push($this->instance->partId, $mealIngredient?->ingredientId);
                array_push($this->instance->partBrandId, $mealIngredient?->ingredientBrandId);

                array_push($this->instance->cookingTypeId, $mealIngredient?->cookingTypeId);
                array_push($this->instance->partType, $mealIngredient?->partType);
                array_push($this->instance->amount, $mealIngredient?->amount);
                array_push($this->instance->remarks, $mealIngredient?->remarks);
                array_push($this->instance->groupToken, $mealIngredient?->groupToken);
                array_push($this->instance->isRemovable, $mealIngredient?->isRemovable);
                array_push($this->instance->isDefault, $mealIngredient?->isDefault);
                array_push($this->instance->mealId, $mealIngredient?->mealId);
                array_push($this->instance->mealSizeId, $mealIngredient?->mealSizeId);
                array_push($this->instance->isRemoved, false);




                // 1.4: macros
                array_push($this->instance->grams, 0);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);


                array_push($this->instance->afterCookGrams, 0);
                array_push($this->instance->afterCookCalories, 0);
                array_push($this->instance->afterCookProteins, 0);
                array_push($this->instance->afterCookCarbs, 0);
                array_push($this->instance->afterCookFats, 0);
                array_push($this->instance->afterCookCost, 0);

            } // end if





        } // end loop








        // -------------------------------------------------------
        // -------------------------------------------------------
        // -------------------------------------------------------
        // -------------------------------------------------------








        // 2: parts
        foreach ($this->meal?->parts?->groupBy('groupToken') ?? [] as $key => $mealParts) {




            // A: withoutDuplicates
            $mealPart = $mealParts->first();





            // 2.1: general
            array_push($this->instanceUnique->type, 'Part');

            array_push($this->instanceUnique->typeId, $mealPart?->typeId);
            array_push($this->instanceUnique->typeName, strtolower($mealPart->type->name));

            array_push($this->instanceUnique->id, $mealPart?->id);
            array_push($this->instanceUnique->partId, $mealPart?->partId);
            array_push($this->instanceUnique->partBrandId, null);

            array_push($this->instanceUnique->cookingTypeId, $mealPart?->cookingTypeId);
            array_push($this->instanceUnique->partType, $mealPart?->partType);
            array_push($this->instanceUnique->amount, $mealPart?->amount);
            array_push($this->instanceUnique->remarks, $mealPart?->remarks);
            array_push($this->instanceUnique->groupToken, $mealPart?->groupToken);
            array_push($this->instanceUnique->isRemovable, boolval($mealPart?->isRemovable));
            array_push($this->instanceUnique->isDefault, $mealPart?->isDefault);
            array_push($this->instanceUnique->mealId, $mealPart?->mealId);
            array_push($this->instanceUnique->mealSizeId, $mealPart?->mealSizeId);
            array_push($this->instanceUnique->isRemoved, false);




            // 2.3: macros
            array_push($this->instanceUnique->grams, 0);
            array_push($this->instanceUnique->calories, 0);
            array_push($this->instanceUnique->proteins, 0);
            array_push($this->instanceUnique->carbs, 0);
            array_push($this->instanceUnique->fats, 0);
            array_push($this->instanceUnique->cost, 0);

            array_push($this->instanceUnique->afterCookGrams, 0);
            array_push($this->instanceUnique->afterCookCalories, 0);
            array_push($this->instanceUnique->afterCookProteins, 0);
            array_push($this->instanceUnique->afterCookCarbs, 0);
            array_push($this->instanceUnique->afterCookFats, 0);
            array_push($this->instanceUnique->afterCookCost, 0);







            // B: withDuplicates
            foreach ($mealParts as $innerKey => $mealPart) {




                // 2.4: general
                array_push($this->instance->type, 'Part');

                array_push($this->instance->typeId, $mealPart?->typeId);
                array_push($this->instance->typeName, strtolower($mealPart->type->name));

                array_push($this->instance->id, $mealPart?->id);
                array_push($this->instance->partId, $mealPart?->partId);
                array_push($this->instance->partBrandId, null);

                array_push($this->instance->cookingTypeId, $mealPart?->cookingTypeId);
                array_push($this->instance->partType, $mealPart?->partType);
                array_push($this->instance->amount, $mealPart?->amount);
                array_push($this->instance->remarks, $mealPart?->remarks);
                array_push($this->instance->groupToken, $mealPart?->groupToken);
                array_push($this->instance->isRemovable, $mealPart?->isRemovable);
                array_push($this->instance->isDefault, $mealPart?->isDefault);
                array_push($this->instance->mealId, $mealPart?->mealId);
                array_push($this->instance->mealSizeId, $mealPart?->mealSizeId);
                array_push($this->instance->isRemoved, false);




                // 2.5: macros
                array_push($this->instance->grams, 0);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);

                array_push($this->instance->afterCookGrams, 0);
                array_push($this->instance->afterCookCalories, 0);
                array_push($this->instance->afterCookProteins, 0);
                array_push($this->instance->afterCookCarbs, 0);
                array_push($this->instance->afterCookFats, 0);
                array_push($this->instance->afterCookCost, 0);



            } // end if


        } // end loop









        $this->dispatch('initCertainSelect', class: '.part--select');
        $this->dispatch('initCertainSelect', class: '.part--brand-select');
        $this->dispatch('initCertainSelect', class: '.part--type-select');
        $this->dispatch('initCertainSelect', class: '.part--cooking-type-select');








    } // end function







    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------











    #[On('createBuilderItem')]
    public function append($typeId)
    {



        // 1: makeGroupToken
        $groupToken = $this->makeGroupToken();





        // 1.2: loop - mealSizes
        foreach ($this->meal->sizes as $key => $mealSize) {



            if ($typeId == 'Ingredient') {



                // 1.4: general
                array_push($this->instance->type, 'Ingredient');

                array_push($this->instance->id, $this->appendCounter++);
                array_push($this->instance->typeId, 'Ingredient');
                array_push($this->instance->typeName, 'ingredient');
                array_push($this->instance->groupToken, $groupToken);
                array_push($this->instance->mealId, $this->meal->id);
                array_push($this->instance->mealSizeId, $mealSize->id);




                // 1.5: fillers
                array_push($this->instance->partId, null);
                array_push($this->instance->partBrandId, null);
                array_push($this->instance->cookingTypeId, null);
                array_push($this->instance->partType, null);
                array_push($this->instance->amount, null);
                array_push($this->instance->remarks, null);
                array_push($this->instance->isRemovable, false);
                array_push($this->instance->isDefault, false);
                array_push($this->instance->isRemoved, false);


                array_push($this->instance->grams, 0);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);

                array_push($this->instance->afterCookGrams, 0);
                array_push($this->instance->afterCookCalories, 0);
                array_push($this->instance->afterCookProteins, 0);
                array_push($this->instance->afterCookCarbs, 0);
                array_push($this->instance->afterCookFats, 0);
                array_push($this->instance->afterCookCost, 0);





                // 1.6: unique
                if ($key == 0) {


                    array_push($this->instanceUnique->type, 'Ingredient');

                    array_push($this->instanceUnique->id, $this->appendCounter);
                    array_push($this->instanceUnique->typeId, 'Ingredient');
                    array_push($this->instanceUnique->typeName, 'ingredient');
                    array_push($this->instanceUnique->groupToken, $groupToken);
                    array_push($this->instanceUnique->mealId, $this->meal->id);
                    array_push($this->instanceUnique->mealSizeId, $mealSize->id);



                    // 1.7: fillers
                    array_push($this->instanceUnique->partId, null);
                    array_push($this->instanceUnique->partBrandId, null);
                    array_push($this->instanceUnique->cookingTypeId, null);
                    array_push($this->instanceUnique->partType, null);
                    array_push($this->instanceUnique->amount, null);
                    array_push($this->instanceUnique->remarks, null);
                    array_push($this->instanceUnique->isRemovable, false);
                    array_push($this->instanceUnique->isDefault, false);
                    array_push($this->instanceUnique->isRemoved, false);


                    array_push($this->instanceUnique->grams, 0);
                    array_push($this->instanceUnique->calories, 0);
                    array_push($this->instanceUnique->proteins, 0);
                    array_push($this->instanceUnique->carbs, 0);
                    array_push($this->instanceUnique->fats, 0);
                    array_push($this->instanceUnique->cost, 0);

                    array_push($this->instanceUnique->afterCookGrams, 0);
                    array_push($this->instanceUnique->afterCookCalories, 0);
                    array_push($this->instanceUnique->afterCookProteins, 0);
                    array_push($this->instanceUnique->afterCookCarbs, 0);
                    array_push($this->instanceUnique->afterCookFats, 0);
                    array_push($this->instanceUnique->afterCookCost, 0);



                } // end if









            } else {



                // 1.4: general
                $type = Type::find($typeId);
                array_push($this->instance->type, 'Part');

                array_push($this->instance->id, $this->appendCounter++);
                array_push($this->instance->typeId, $type->id);
                array_push($this->instance->typeName, strtolower($type->name));
                array_push($this->instance->groupToken, $groupToken);
                array_push($this->instance->mealId, $this->meal->id);
                array_push($this->instance->mealSizeId, $mealSize->id);



                // 1.5: fillers
                array_push($this->instance->partId, null);
                array_push($this->instance->partBrandId, null);

                array_push($this->instance->cookingTypeId, null);
                array_push($this->instance->partType, null);
                array_push($this->instance->amount, null);
                array_push($this->instance->remarks, null);
                array_push($this->instance->isRemovable, false);
                array_push($this->instance->isDefault, false);
                array_push($this->instance->isRemoved, false);

                array_push($this->instance->grams, 0);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);

                array_push($this->instance->afterCookGrams, 0);
                array_push($this->instance->afterCookCalories, 0);
                array_push($this->instance->afterCookProteins, 0);
                array_push($this->instance->afterCookCarbs, 0);
                array_push($this->instance->afterCookFats, 0);
                array_push($this->instance->afterCookCost, 0);







                // 1.6: unique
                if ($key == 0) {


                    array_push($this->instanceUnique->type, 'Part');

                    array_push($this->instanceUnique->id, $this->appendCounter);
                    array_push($this->instanceUnique->typeId, $type->id);
                    array_push($this->instanceUnique->typeName, strtolower($type->name));
                    array_push($this->instanceUnique->groupToken, $groupToken);
                    array_push($this->instanceUnique->mealId, $this->meal->id);
                    array_push($this->instanceUnique->mealSizeId, $mealSize->id);






                    // 1.7: fillers
                    array_push($this->instanceUnique->partId, null);
                    array_push($this->instanceUnique->partBrandId, null);

                    array_push($this->instanceUnique->cookingTypeId, null);
                    array_push($this->instanceUnique->partType, null);
                    array_push($this->instanceUnique->amount, null);
                    array_push($this->instanceUnique->remarks, null);
                    array_push($this->instanceUnique->isRemovable, false);
                    array_push($this->instanceUnique->isDefault, false);
                    array_push($this->instanceUnique->isRemoved, false);

                    array_push($this->instanceUnique->grams, 0);
                    array_push($this->instanceUnique->calories, 0);
                    array_push($this->instanceUnique->proteins, 0);
                    array_push($this->instanceUnique->carbs, 0);
                    array_push($this->instanceUnique->fats, 0);
                    array_push($this->instanceUnique->cost, 0);

                    array_push($this->instanceUnique->afterCookGrams, 0);
                    array_push($this->instanceUnique->afterCookCalories, 0);
                    array_push($this->instanceUnique->afterCookProteins, 0);
                    array_push($this->instanceUnique->afterCookCarbs, 0);
                    array_push($this->instanceUnique->afterCookFats, 0);
                    array_push($this->instanceUnique->afterCookCost, 0);


                } // end if



            } // end if



        } // end loop








        $this->dispatch('initCertainSelect', class: '.part--select');
        $this->dispatch('initCertainSelect', class: '.part--brand-select');
        $this->dispatch('initCertainSelect', class: '.part--type-select');
        $this->dispatch('initCertainSelect', class: '.part--cooking-type-select');




    } // end function











    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------









    #[On('removeBuilderPart')]
    public function removeBuilderPart($groupToken)
    {



        // :: index
        $index = null;





        // 1: loop - instance
        foreach ($this->instance as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleRemoved
            if ($index >= 0 && $key == 'isRemoved') {


                for ($i = 0; $i < $this->instance->numberOfSizes; $i++) {

                    $this->instance->isRemoved[$index + $i] = true;
                    $this->instance->amount[$index + $i] = 0;
                    $this->instance->grams[$index + $i] = 0;


                } // end loop

            } // end if



        } // end loop







        // -------------------------------------------
        // -------------------------------------------





        // 2: loop - instanceUnique
        $index = null;
        foreach ($this->instanceUnique as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------






            // 1.3: toggleRemoved
            if ($index >= 0 && $key == 'isRemoved') {

                $this->instanceUnique->isRemoved[$index] = true;
                $this->instanceUnique->amount[$index] = 0;
                $this->instanceUnique->grams[$index] = 0;


            } // end if



        } // end loop







        // 2: initialize instance
        $this->dispatch('refreshBuilderSingleItem', $this->instanceUnique, $groupToken);
        $this->dispatch('refreshBuilderSingleOption', $this->instance, $groupToken);


    } // end function










    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------












    public function refreshPartMacros($instance, $index)
    {



        // 1: convert
        $instance = json_decode(json_encode($instance));



        // 1.2: regularMacros
        $this->instance->grams[$index] = $instance->grams[$index] ?? 0;
        $this->instance->calories[$index] = $instance->calories[$index] ?? 0;
        $this->instance->proteins[$index] = $instance->proteins[$index] ?? 0;
        $this->instance->carbs[$index] = $instance->carbs[$index] ?? 0;
        $this->instance->fats[$index] = $instance->fats[$index] ?? 0;
        $this->instance->cost[$index] = $instance->cost[$index] ?? 0;



        // 1.3: afterCookMacros
        $this->instance->afterCookGrams[$index] = $instance->afterCookGrams[$index] ?? 0;
        $this->instance->afterCookCalories[$index] = $instance->afterCookCalories[$index] ?? 0;
        $this->instance->afterCookProteins[$index] = $instance->afterCookProteins[$index] ?? 0;
        $this->instance->afterCookCarbs[$index] = $instance->afterCookCarbs[$index] ?? 0;
        $this->instance->afterCookFats[$index] = $instance->afterCookFats[$index] ?? 0;
        $this->instance->afterCookCost[$index] = $instance->afterCookCost[$index] ?? 0;






    } // end function













    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------









    public function remove($groupToken)
    {





        // :: index
        $index = null;




        // 1: loop - instance
        foreach ($this->instance as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isRemoved') {


                for ($i = 0; $i < $this->instance->numberOfSizes; $i++) {

                    $this->instance->isRemoved[$index + $i] = true;

                } // end loop

            } // end if



        } // end loop






        // -------------------------------
        // -------------------------------







        // 2: loop - instanceUnique
        $index = null;

        foreach ($this->instanceUnique as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isRemoved') {

                $this->instanceUnique->isRemoved[$index] = true;

            } // end if



        } // end loop







        $this->recalculateTotal();



    } // end function







    // -----------------------------------------------------
    // -----------------------------------------------------








    public function toggleRemovable($groupToken, $targetIndex)
    {




        // :: index
        $index = null;




        // 1: loop - instance
        foreach ($this->instance as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isRemovable') {


                for ($i = 0; $i < $this->instance->numberOfSizes; $i++) {


                    $this->instance->isRemovable[$index + $i] = $this->instance->isRemovable[$targetIndex];


                } // end loop

            } // end if



        } // end loop






        // -------------------------------
        // -------------------------------







        // 2: loop - instanceUnique
        $index = null;

        foreach ($this->instanceUnique as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isRemovable') {

                $this->instanceUnique->isRemovable[$index + $i] = $this->instance->isRemovable[$targetIndex];


            } // end if



        } // end loop


    } // end function












    // -----------------------------------------------------
    // -----------------------------------------------------








    public function toggleDefault($groupToken, $targetIndex)
    {




        // :: index
        $index = null;




        // 1: loop - instance
        foreach ($this->instance as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isDefault') {


                for ($i = 0; $i < $this->instance->numberOfSizes; $i++) {


                    $this->instance->isDefault[$index + $i] = $this->instance->isDefault[$targetIndex];


                } // end loop

            } // end if



        } // end loop






        // -------------------------------
        // -------------------------------







        // 2: loop - instanceUnique
        $index = null;

        foreach ($this->instanceUnique as $key => $values) {



            if ($index >= 0 && $key == 'groupToken') {

                foreach ($values as $innerKey => $value) {

                    if ($value == $groupToken) {

                        $index = $innerKey;
                        break;

                    } // end if

                } // end loop

            } // end if






            // -----------------------------------
            // -----------------------------------







            // 1.3: toggleByKey
            if ($index >= 0 && $key == 'isDefault') {

                $this->instanceUnique->isDefault[$index + $i] = $this->instance->isDefault[$targetIndex];


            } // end if



        } // end loop







        $this->recalculateTotal();



    } // end function










    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------










    public function getPartBrands($index, $value = null)
    {


        // 1: getBrands
        if ($this->instanceUnique?->type[$index] == 'Ingredient') {



            $brands = IngredientMacro::where('ingredientId', $value)
                    ?->get(['id', 'brand as text'])?->toArray() ?? [];


            // 1.2: pre-option
            count($brands ?? []) ? array_unshift($brands, ['id' => '', 'text' => '']) : null;

            $this->dispatch('refreshSelect', id: "#part--brand-select-{$index}", data: $brands);
            $this->dispatch('setSelect', id: "#part--brand-select-{$index}", value: $this->instanceUnique->partBrandId[$index] ?? null);



        } // end if


    } // end function











    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------










    public function update()
    {




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/ingredients/update', $this->instance);

        $this->makeAlert('success', $response->message);



    } // end function










    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
    // -----------------------------------------------------
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







        // 1: create instance
        $instance = new stdClass();
        $instance->value = $value;
        $instance->macroType = $macroType;
        $instance->mealSizeId = $mealSizeId;



        if ($macroType && $value && $mealSizeId) {

            $response = $this->makeRequest('dashboard/menu/builder/ingredients/macros/update', $instance);

        } // end if


    } // end function














    // -----------------------------------------------------
    // -----------------------------------------------------








    public function recalculate($i)
    {



        if ($this->instance->partId[$i]) {



            // 1: getMacro
            if ($this->instance->type[$i] == 'Ingredient') {


                // dd($this->instance, $this->instanceUnique);

                $totalMacros = $this->mealPartForIngredient->totalMacro($this->instance->amount[$i] ?? 0, $this->instance->partBrandId[$i], $this->instance->partId[$i]);

            } else {

                $totalMacros = $this->mealPart->totalMacro($this->instance->amount[$i] ?? 0, $this->instance->partBrandId[$i], $this->instance->partId[$i]);

            } // end if








            $this->instance->calories[$i] = $this->instance->afterCookCalories[$i] = $totalMacros->calories;
            $this->instance->proteins[$i] = $this->instance->afterCookProteins[$i] = $totalMacros->proteins;
            $this->instance->carbs[$i] = $this->instance->afterCookCarbs[$i] = $totalMacros->carbs;
            $this->instance->fats[$i] = $this->instance->afterCookFats[$i] = $totalMacros->fats;
            $this->instance->cost[$i] = $this->instance->afterCookCost[$i] = $totalMacros->cost;
            $this->instance->grams[$i] = $this->instance->afterCookGrams[$i] = $this->instance->amount[$i] ?? 0;








            // -----------------------------------------------
            // -----------------------------------------------







            // 2: getAfterCookGrams
            if ($this->instance->typeId[$i] == 'Ingredient' && ! empty($this->instance->partId[$i]) && ! empty($this->instance->cookingTypeId[$i])) {





                // 2.1: get conversionValue
                $conversion = ConversionIngredient::where('ingredientId', $this->instance->partId[$i])
                    ->where('cookingTypeId', $this->instance->cookingTypeId[$i])?->first();




                if ($conversion) {


                    // 2.3: updateAfterCook Macros
                    $this->instance->afterCookGrams[$i] = round($this->instance->afterCookGrams[$i] * $conversion->conversionValue, 2);


                    $this->instance->afterCookCalories[$i] = (($totalMacros->calories / ($conversion->conversionValue > 0 ? $conversion->conversionValue : 1)) / ($this->instance->grams[$i] > 0 ? $this->instance->grams[$i] : 1)) * $this->instance->afterCookGrams[$i];


                    $this->instance->afterCookProteins[$i] = (($totalMacros->proteins / ($conversion->conversionValue > 0 ? $conversion->conversionValue : 1)) / ($this->instance->grams[$i] > 0 ? $this->instance->grams[$i] : 1)) * $this->instance->afterCookGrams[$i];


                    $this->instance->afterCookCarbs[$i] = (($totalMacros->carbs / ($conversion->conversionValue > 0 ? $conversion->conversionValue : 1)) / ($this->instance->grams[$i] > 0 ? $this->instance->grams[$i] : 1)) * $this->instance->afterCookGrams[$i];


                    $this->instance->afterCookFats[$i] = (($totalMacros->fats / ($conversion->conversionValue > 0 ? $conversion->conversionValue : 1)) / ($this->instance->grams[$i] > 0 ? $this->instance->grams[$i] : 1)) * $this->instance->afterCookGrams[$i];




                } // end if - exists


            } // end if - checkConversion









            // 3: refreshMacros
            $this->recalculateTotal();




        } // end if


    } // end function









    // -----------------------------------------------------
    // -----------------------------------------------------










    public function recalculateTotal()
    {




        // 1: convert
        $this->instanceOptions->reset();


        // 1.2: loop - instance
        for ($i = 0; $i < count($this->instance->grams ?? []); $i++) {


            if ($this->instance->isRemoved[$i] == false && $this->instance->isDefault[$i] == true) {



                // A: raw
                $this->instanceOptions->totalGrams[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalGrams[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->grams[$i], 1);

                $this->instanceOptions->totalCalories[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalCalories[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->calories[$i], 1);


                $this->instanceOptions->totalProteins[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalProteins[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->proteins[$i], 1);


                $this->instanceOptions->totalCarbs[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalCarbs[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->carbs[$i], 1);

                $this->instanceOptions->totalFats[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalFats[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->fats[$i], 1);


                $this->instanceOptions->totalCost[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalCost[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->cost[$i], 1);





                // B: afterCook
                $this->instanceOptions->totalAfterCookGrams[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookGrams[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookGrams[$i], 1);


                $this->instanceOptions->totalAfterCookCalories[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookCalories[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookCalories[$i], 1);


                $this->instanceOptions->totalAfterCookProteins[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookProteins[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookProteins[$i], 1);


                $this->instanceOptions->totalAfterCookCarbs[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookCarbs[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookCarbs[$i], 1);



                $this->instanceOptions->totalAfterCookFats[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookFats[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookFats[$i], 1);



                $this->instanceOptions->totalAfterCookCost[$this->instance->mealSizeId[$i]] =
                    round(($this->instanceOptions->totalAfterCookCost[$this->instance->mealSizeId[$i]] ?? 0) + $this->instance->afterCookCost[$i], 1);



            } // end if

        } // end loop



    } // end function











    // -----------------------------------------------------
    // -----------------------------------------------------







    public function render()
    {



        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content');


    } // end function





} // end class
