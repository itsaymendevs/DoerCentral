<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\ConversionIngredient;
use App\Models\MealIngredient;
use App\Models\MealPart;
use App\Models\MealSize;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentOptionsIngredients extends Component
{


    use HelperTrait;


    // :: variables
    public $instance, $i;
    public $mealSize, $mealPart;






    public function mount($instance, $i, $id)
    {



        // 1: get instances
        $this->i = $i;
        $this->instance = $instance;
        $this->mealSize = MealSize::find($id);









        // --------------------------------------------
        // --------------------------------------------



        // 2: get instance / create
        $this->mealPart = MealIngredient::find($instance->partId[$i]);





        // 2.5: create instance
        if (! $this->mealPart) {



            // 2.5.1: create
            $this->mealPart = new MealIngredient();

            $this->mealPart->typeId = $instance->typeId[$i];
            $this->mealPart->mealId = $instance->mealId[$i];
            $this->mealPart->mealSizeId = $instance->mealSizeId[$i];
            $this->mealPart->groupToken = $instance->groupToken[$i];



        } // end if







        $this->recalculate();




    } // end function










    // -----------------------------------------------------





    #[On('refreshBuilderSingleOption')]
    public function refreshOption($instance, $groupToken)
    {

        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {

            $this->instance->isRemoved[$this->i] = $instance['isRemoved'][$this->i];

        } // end if



    } // end function








    // -----------------------------------------------------







    #[On('refreshBuilderPart')]
    public function refreshPart($instance, $groupToken)
    {


        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {


            $this->instance->partId[$this->i] = $instance['partId'][$this->i];
            $this->instance->partBrandId[$this->i] = $instance['partBrandId'][$this->i];
            $this->instance->isRemovable[$this->i] = $instance['isRemovable'][$this->i];




            // 1.2: sync
            $this->mealPart->ingredientId = $this->instance->partId[$this->i];
            $this->recalculate();



        } // end if


    } // end function








    // -----------------------------------------------------








    #[On('refreshBuilderPartBrand')]
    public function refreshPartBrand($instance, $groupToken)
    {



        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {

            $this->instance->partBrandId[$this->i] = $instance['partBrandId'][$this->i];

            $this->recalculate();

        } // end if



    } // end function








    // -----------------------------------------------------










    #[On('refreshBuilderPartType')]
    public function refreshPartType($instance, $groupToken)
    {


        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {

            $this->instance->partType[$this->i] = $instance['partType'][$this->i];
            $this->instance->cookingTypeId[$this->i] = $instance['cookingTypeId'][$this->i];

            $this->recalculate();

        } // end if





    } // end function









    // -----------------------------------------------------





    #[On('refreshBuilderPartCookingType')]
    public function refreshPartCookingType($instance, $groupToken)
    {


        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {

            $this->instance->cookingTypeId[$this->i] = $instance['cookingTypeId'][$this->i];

            $this->recalculate();

        } // end if



    } // end function










    // -----------------------------------------------------







    #[On('refreshBuilderPartTogglers')]
    public function refreshTogglers($instance, $groupToken)
    {


        // 1: update instance
        if ($groupToken == $this->instance->groupToken[$this->i]) {

            $this->instance->isRemovable[$this->i] = $instance['isRemovable'][$this->i];

        } // end if



    } // end function










    // -----------------------------------------------------------







    public function remove()
    {


        // 1: dispatchEvent
        $this->dispatch('no-events', class: '.togglers--checkbox', delay: 3000);
        $this->dispatch('removeBuilderPart', $this->instance->groupToken[$this->i]);




    } // end function










    // -----------------------------------------------------









    public function toggleRemovable()
    {


        // 1: dispatchEvent
        $this->dispatch('no-events', class: '.togglers--checkbox', delay: 2000);
        $this->dispatch('toggleBuilderPart', 'isRemovable', $this->instance->groupToken[$this->i], $this->instance->isRemovable[$this->i]);




    } // end function










    // -----------------------------------------------------








    public function recalculate()
    {



        if ($this->instance->partId[$this->i]) {

            $i = $this->i;





            // 1: getMacro
            $totalMacros = $this->mealPart->totalMacro($this->instance->amount[$i] ?? 0, $this->instance->partBrandId[$i], $this->instance->partId[$i]);


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
            $this->dispatch("refreshBuilderPartMacros", $this->instance, $this->i);





        } // end if


    } // end function








    // -----------------------------------------------------







    public function render()
    {



        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options-ingredients');



    } // end function




} // end class
