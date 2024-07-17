<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components\ProductionBuilderManageContent\Components;

use App\Models\Meal;
use App\Models\MealPart;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManageContentItemsPart extends Component
{


    // :: variables
    public $instance, $i;







    public function mount($instance, $i)
    {

        // 1: get instance
        $this->i = $i;
        $this->instance = $instance;


    } // end function







    // -----------------------------------------------------







    public function render()
    {



        // 1: dependencies
        $inPartsOfMeal = MealPart::where('partId', $this->instance->mealId[$this->i])->get()
                ?->pluck('mealId')?->toArray() ?? [];

        $relationInPartsOfMeal = MealPart::whereIn('partId', $inPartsOfMeal)->get()
                ?->pluck('mealId')?->toArray() ?? [];




        $mealOptions = Meal::where('id', '!=', $this->instance->mealId[$this->i])
            ->whereNotIn('id', $inPartsOfMeal)
            ->whereNotIn('id', $relationInPartsOfMeal)
            ->get();







        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-content.components.production-builder-manage-content-items-part', compact('mealOptions'));



    } // end function




} // end class
