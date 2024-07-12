<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\BuilderMealForm;
use App\Models\Meal;
use App\Models\Type;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContent extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public $meal;
    public BuilderMealForm $instance;
    public BuilderMealForm $instanceUnique;






    public function mount($id)
    {



        // 1: get instance
        $this->meal = Meal::find($id);







        // 1.2: ingredients
        foreach ($this->meal?->ingredients ?? [] as $mealIngredient) {



            // 1.3: general
            array_push($this->instance->type, 'Ingredient');

            array_push($this->instance->typeId, null);
            array_push($this->instance->typeName, 'ingredient');




            array_push($this->instance->partId, $mealIngredient?->ingredientId);
            array_push($this->instance->cookingTypeId, $mealIngredient?->cookingTypeId);
            array_push($this->instance->partType, $mealIngredient?->partType);
            array_push($this->instance->amount, $mealIngredient?->amount);
            array_push($this->instance->remarks, $mealIngredient?->remarks);
            array_push($this->instance->groupToken, $mealIngredient?->groupToken);
            array_push($this->instance->isRemovable, $mealIngredient?->isRemovable);
            array_push($this->instance->isDefault, $mealIngredient?->isDefault);
            array_push($this->instance->mealId, $mealIngredient?->mealId);
            array_push($this->instance->mealSizeId, $mealIngredient?->mealSizeId);




            // 1.4: macros
            array_push($this->instance->calories, 2);
            array_push($this->instance->proteins, 2);
            array_push($this->instance->carbs, 2);
            array_push($this->instance->fats, 2);
            array_push($this->instance->cost, 2);




        } // end loop








        // 1.5: parts
        foreach ($this->meal?->parts ?? [] as $mealPart) {



            // 1.6: general
            array_push($this->instance->type, 'Part');

            array_push($this->instance->typeId, $mealPart?->typeId);
            array_push($this->instance->typeName, strtolower($mealPart->type->name));


            array_push($this->instance->partId, $mealPart?->partId);
            array_push($this->instance->cookingTypeId, $mealPart?->cookingTypeId);
            array_push($this->instance->partType, $mealPart?->partType);
            array_push($this->instance->amount, $mealPart?->amount);
            array_push($this->instance->remarks, $mealPart?->remarks);
            array_push($this->instance->groupToken, $mealPart?->groupToken);
            array_push($this->instance->isRemovable, $mealPart?->isRemovable);
            array_push($this->instance->isDefault, $mealPart?->isDefault);
            array_push($this->instance->mealId, $mealPart?->mealId);
            array_push($this->instance->mealSizeId, $mealPart?->mealSizeId);




            // 1.7: macros
            array_push($this->instance->calories, 2);
            array_push($this->instance->proteins, 2);
            array_push($this->instance->carbs, 2);
            array_push($this->instance->fats, 2);
            array_push($this->instance->cost, 2);



        } // end loop









        // -------------------------------------------------------
        // -------------------------------------------------------




        // 2: withoutDuplicates







        // 2.1: ingredients
        foreach ($this->meal?->ingredients?->groupBy('groupToken') ?? [] as $commonToken => $mealIngredientByToken) {



            // ** getFirst **
            $mealIngredient = $mealIngredientByToken->first();






            // 1.3: general
            array_push($this->instanceUnique->type, 'Ingredient');

            array_push($this->instanceUnique->typeId, null);
            array_push($this->instanceUnique->typeName, 'ingredient');



            array_push($this->instanceUnique->partId, $mealIngredient?->ingredientId);
            array_push($this->instanceUnique->cookingTypeId, $mealIngredient?->cookingTypeId);
            array_push($this->instanceUnique->partType, $mealIngredient?->partType);
            array_push($this->instanceUnique->amount, $mealIngredient?->amount);
            array_push($this->instanceUnique->remarks, $mealIngredient?->remarks);
            array_push($this->instanceUnique->groupToken, $mealIngredient?->groupToken);
            array_push($this->instanceUnique->isRemovable, $mealIngredient?->isRemovable);
            array_push($this->instanceUnique->isDefault, $mealIngredient?->isDefault);
            array_push($this->instanceUnique->mealId, $mealIngredient?->mealId);
            array_push($this->instanceUnique->mealSizeId, $mealIngredient?->mealSizeId);




            // 1.4: macros
            array_push($this->instanceUnique->calories, 2);
            array_push($this->instanceUnique->proteins, 2);
            array_push($this->instanceUnique->carbs, 2);
            array_push($this->instanceUnique->fats, 2);
            array_push($this->instanceUnique->cost, 2);




        } // end loop








        // 1.5: parts
        foreach ($this->meal?->parts?->groupBy('groupToken') ?? [] as $mealPartByToken) {



            // ** getFirst **
            $mealPart = $mealPartByToken->first();





            // 1.6: general
            array_push($this->instanceUnique->type, 'Part');

            array_push($this->instanceUnique->typeId, $mealPart?->typeId);
            array_push($this->instanceUnique->typeName, strtolower($mealPart->type->name));


            array_push($this->instanceUnique->partId, $mealPart?->partId);
            array_push($this->instanceUnique->cookingTypeId, $mealPart?->cookingTypeId);
            array_push($this->instanceUnique->partType, $mealPart?->partType);
            array_push($this->instanceUnique->amount, $mealPart?->amount);
            array_push($this->instanceUnique->remarks, $mealPart?->remarks);
            array_push($this->instanceUnique->groupToken, $mealPart?->groupToken);
            array_push($this->instanceUnique->isRemovable, $mealPart?->isRemovable);
            array_push($this->instanceUnique->isDefault, $mealPart?->isDefault);
            array_push($this->instanceUnique->mealId, $mealPart?->mealId);
            array_push($this->instanceUnique->mealSizeId, $mealPart?->mealSizeId);




            // 1.7: macros
            array_push($this->instanceUnique->calories, 2);
            array_push($this->instanceUnique->proteins, 2);
            array_push($this->instanceUnique->carbs, 2);
            array_push($this->instanceUnique->fats, 2);
            array_push($this->instanceUnique->cost, 2);



        } // end loop






        $this->dispatch('initCertainSelect', class: '.part--select');
        $this->dispatch('initCertainSelect', class: '.part--type-select');
        $this->dispatch('initCertainSelect', class: '.part--cooking-type-select');






    } // end function







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

                array_push($this->instance->typeId, null);
                array_push($this->instance->typeName, 'ingredient');
                array_push($this->instance->groupToken, $groupToken);
                array_push($this->instance->mealId, $this->meal->id);
                array_push($this->instance->mealSizeId, $mealSize->id);




                // 1.5: fillers
                array_push($this->instance->partId, null);
                array_push($this->instance->cookingTypeId, null);
                array_push($this->instance->partType, null);
                array_push($this->instance->amount, null);
                array_push($this->instance->remarks, null);
                array_push($this->instance->isRemovable, false);
                array_push($this->instance->isDefault, false);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);






                // 1.6: unique
                if ($key == 0) {


                    array_push($this->instanceUnique->type, 'Ingredient');

                    array_push($this->instanceUnique->typeId, null);
                    array_push($this->instanceUnique->typeName, 'ingredient');
                    array_push($this->instanceUnique->groupToken, $groupToken);
                    array_push($this->instanceUnique->mealId, $this->meal->id);
                    array_push($this->instanceUnique->mealSizeId, $mealSize->id);



                    // 1.7: fillers
                    array_push($this->instanceUnique->partId, null);
                    array_push($this->instanceUnique->cookingTypeId, null);
                    array_push($this->instanceUnique->partType, null);
                    array_push($this->instanceUnique->amount, null);
                    array_push($this->instanceUnique->remarks, null);
                    array_push($this->instanceUnique->isRemovable, false);
                    array_push($this->instanceUnique->isDefault, false);
                    array_push($this->instanceUnique->calories, 0);
                    array_push($this->instanceUnique->proteins, 0);
                    array_push($this->instanceUnique->carbs, 0);
                    array_push($this->instanceUnique->fats, 0);
                    array_push($this->instanceUnique->cost, 0);




                } // end if









            } else {



                // 1.4: general
                $type = Type::find($typeId);
                array_push($this->instance->type, 'Part');

                array_push($this->instance->typeId, $type->id);
                array_push($this->instance->typeName, strtolower($type->name));
                array_push($this->instance->groupToken, $groupToken);
                array_push($this->instance->mealId, $this->meal->id);
                array_push($this->instance->mealSizeId, $mealSize->id);



                // 1.5: fillers
                array_push($this->instance->partId, null);
                array_push($this->instance->cookingTypeId, null);
                array_push($this->instance->partType, null);
                array_push($this->instance->amount, null);
                array_push($this->instance->remarks, null);
                array_push($this->instance->isRemovable, false);
                array_push($this->instance->isDefault, false);
                array_push($this->instance->calories, 0);
                array_push($this->instance->proteins, 0);
                array_push($this->instance->carbs, 0);
                array_push($this->instance->fats, 0);
                array_push($this->instance->cost, 0);








                // 1.6: unique
                if ($key == 0) {


                    array_push($this->instanceUnique->type, 'Part');

                    array_push($this->instanceUnique->typeId, $type->id);
                    array_push($this->instanceUnique->typeName, strtolower($type->name));
                    array_push($this->instanceUnique->groupToken, $groupToken);
                    array_push($this->instanceUnique->mealId, $this->meal->id);
                    array_push($this->instanceUnique->mealSizeId, $mealSize->id);






                    // 1.7: fillers
                    array_push($this->instanceUnique->partId, null);
                    array_push($this->instanceUnique->cookingTypeId, null);
                    array_push($this->instanceUnique->partType, null);
                    array_push($this->instanceUnique->amount, null);
                    array_push($this->instanceUnique->remarks, null);
                    array_push($this->instanceUnique->isRemovable, false);
                    array_push($this->instanceUnique->isDefault, false);
                    array_push($this->instanceUnique->calories, 0);
                    array_push($this->instanceUnique->proteins, 0);
                    array_push($this->instanceUnique->carbs, 0);
                    array_push($this->instanceUnique->fats, 0);
                    array_push($this->instanceUnique->cost, 0);



                } // end if



            } // end if



        } // end loop








        // 2: initialize instance
        $this->dispatch('refreshBuilderItems', $this->instanceUnique);




    } // end function














    // -----------------------------------------------------









    public function checkPartType($index, $value)
    {



        // 1: dispatchEvent
        $this->dispatch("refreshBuilderItem-{$index}", $index, $value);



    } // end function






    // -----------------------------------------------------








    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content');


    } // end function





} // end class
