<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\MealPart;
use App\Models\MealSize;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentOptionsParts extends Component
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
        $this->mealPart = MealPart::find($instance->partId[$i]);





        // 2.5: create instance
        if (! $this->mealPart) {



            // 2.5.1: create
            $this->mealPart = new MealPart();

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
            $this->mealPart->partId = $this->instance->partId[$this->i];
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


        // 1: root
        $i = $this->i;




        // A: exists
        if ($this->instance->partId[$i]) {



            // 1: getMacro
            $totalMacros = $this->mealPart->totalMacro($this->instance->amount[$i] ?? 0, $this->instance->partBrandId[$i], $this->instance->partId[$i]);


            $this->instance->calories[$i] = $this->instance->afterCookCalories[$i] = $totalMacros->calories;
            $this->instance->proteins[$i] = $this->instance->afterCookProteins[$i] = $totalMacros->proteins;
            $this->instance->carbs[$i] = $this->instance->afterCookCarbs[$i] = $totalMacros->carbs;
            $this->instance->fats[$i] = $this->instance->afterCookFats[$i] = $totalMacros->fats;
            $this->instance->cost[$i] = $this->instance->afterCookCost[$i] = $totalMacros->cost;
            $this->instance->grams[$i] = $this->instance->afterCookGrams[$i] = $this->instance->amount[$i] ?? 0;





            // 1.2: refreshMacros
            $this->dispatch("refreshBuilderPartMacros", $this->instance, $this->i);




        } // end if


    } // end function









    // -----------------------------------------------------







    public function render()
    {



        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options-parts');



    } // end function




} // end class
