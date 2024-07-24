<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Livewire\Forms\BuilderMealForm;
use App\Livewire\Forms\BuilderMealOptionForm;
use App\Models\MealSize;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManageContentOptions extends Component
{


    use HelperTrait;



    // :: variables
    public BuilderMealOptionForm $instanceOptions;
    public $instance, $initSize, $mealSize;






    public function mount($instance, $id, $initSize)
    {



        // 1: get instances
        $this->initSize = $initSize;
        $this->instance = $instance;
        $this->mealSize = MealSize::find($id);




    } // end function










    // -----------------------------------------------------







    #[On('refreshBuilderOptions')]
    public function remount($instance)
    {


        // 1: get instance
        $this->instance = json_decode(json_encode($instance));
        $this->dispatch("refreshBuilderPart", $this->instance);
        $this->dispatch("refreshBuilderTotalMacros", $this->instance);



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





        // 1: create instance
        $instance = new stdClass();
        $instance->value = $value;
        $instance->macroType = $macroType;
        $instance->mealSizeId = $mealSizeId;



        if ($macroType && $value && $mealSizeId) {


            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/builder/ingredients/macros/update', $instance);


        } // end if





    } // end function









    // -----------------------------------------------------






    #[On('refreshBuilderTotalMacros')]
    public function recalculateTotal($instance = null)
    {


        // 1: convert
        $this->instanceOptions->reset();
        $instance = json_decode(json_encode($instance));



        // 1.2: loop - instance
        for ($i = 0; $i < count($instance->grams ?? []); $i++) {


            if ($instance->isRemoved[$i] == false && $instance->grams[$i]) {



                // A: raw
                $this->instanceOptions->totalGrams[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalGrams[$instance->mealSizeId[$i]] ?? 0) + $instance->grams[$i]);

                $this->instanceOptions->totalCalories[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalCalories[$instance->mealSizeId[$i]] ?? 0) + $instance->calories[$i]);


                $this->instanceOptions->totalProteins[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalProteins[$instance->mealSizeId[$i]] ?? 0) + $instance->proteins[$i]);


                $this->instanceOptions->totalCarbs[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalCarbs[$instance->mealSizeId[$i]] ?? 0) + $instance->carbs[$i]);

                $this->instanceOptions->totalFats[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalFats[$instance->mealSizeId[$i]] ?? 0) + $instance->fats[$i]);


                $this->instanceOptions->totalCost[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalCost[$instance->mealSizeId[$i]] ?? 0) + $instance->cost[$i]);





                // B: afterCook
                $this->instanceOptions->totalAfterCookGrams[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookGrams[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookGrams[$i]);


                $this->instanceOptions->totalAfterCookCalories[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookCalories[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookCalories[$i]);


                $this->instanceOptions->totalAfterCookProteins[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookProteins[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookProteins[$i]);


                $this->instanceOptions->totalAfterCookCarbs[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookCarbs[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookCarbs[$i]);



                $this->instanceOptions->totalAfterCookFats[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookFats[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookFats[$i]);



                $this->instanceOptions->totalAfterCookCost[$instance->mealSizeId[$i]] =
                    (($this->instanceOptions->totalAfterCookCost[$instance->mealSizeId[$i]] ?? 0) + $instance->afterCookCost[$i]);




            } // end if

        } // end loop








        // A: raw
        foreach ($this->instanceOptions->totalGrams as $key => $totalGram) {

            $this->instanceOptions->totalGrams[$key] = round($this->instanceOptions->totalGrams[$key], 1);

            $this->instanceOptions->totalCalories[$key] = round($this->instanceOptions->totalCalories[$key], 1);

            $this->instanceOptions->totalProteins[$key] = round($this->instanceOptions->totalProteins[$key], 1);

            $this->instanceOptions->totalCarbs[$key] = round($this->instanceOptions->totalCarbs[$key], 1);

            $this->instanceOptions->totalFats[$key] = round($this->instanceOptions->totalFats[$key], 1);

            $this->instanceOptions->totalCost[$key] = round($this->instanceOptions->totalCost[$key], 1);





            // B: afterCook
            $this->instanceOptions->totalAfterCookGrams[$key] = round($this->instanceOptions->totalAfterCookGrams[$key], 1);

            $this->instanceOptions->totalAfterCookCalories[$key] = round($this->instanceOptions->totalAfterCookCalories[$key], 1);

            $this->instanceOptions->totalAfterCookProteins[$key] = round($this->instanceOptions->totalAfterCookProteins[$key], 1);

            $this->instanceOptions->totalAfterCookCarbs[$key] = round($this->instanceOptions->totalAfterCookCarbs[$key], 1);


            $this->instanceOptions->totalAfterCookFats[$key] = round($this->instanceOptions->totalAfterCookFats[$key], 1);

            $this->instanceOptions->totalAfterCookCost[$key] = round($this->instanceOptions->totalAfterCookCost[$key], 1);




        } // end function


    } // end function









    // -----------------------------------------------------








    public function render()
    {


        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-options');


    } // end function








} // end class
