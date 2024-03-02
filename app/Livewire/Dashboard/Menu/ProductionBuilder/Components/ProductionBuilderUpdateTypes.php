<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Models\MealType;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderUpdateTypes extends Component
{

    use HelperTrait;





    // :: variables
    public MealForm $instance;
    public $meal;




    public function mount($id)
    {

        // 1: clone instance
        $this->meal = Meal::find($id);

        foreach ($this->meal->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        // 1.2: mealTypes
        $this->instance->mealTypes = $this->meal->type == 'Meal' && $this->meal?->types ? $this->meal?->types?->pluck('mealTypeId')->toArray() : [];



    } // end function







    // -----------------------------------------------------








    public function update()
    {





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/meal-types/update', $this->instance);



        // :: alert
        $this->makeAlert('success', $response->message);



    } // end function











    // -----------------------------------------------------








    public function render()
    {




        // 1: dependencies
        $mealTypes = MealType::whereIn('name', ['Breakfast', 'Lunch', 'Dinner'])->get();
        $snackTypes = ['Sweet', 'Savoury'];
        $drinkTypes = ['Hot Drink', 'Cold Drink'];
        $sauceTypes = ['On Side', 'Part of Meal'];





        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-update-types', compact('mealTypes', 'snackTypes', 'drinkTypes', 'sauceTypes'));


    } // end function


} // end class
