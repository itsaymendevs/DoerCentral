<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPackingForm;
use App\Livewire\Forms\MealServingForm;
use App\Models\Meal;
use App\Models\MealPacking;
use App\Models\MealServing;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductionBuilderManagePackings extends Component
{
    use HelperTrait;



    // :: variables
    public MealPackingForm $instance;
    public MealServingForm $instanceServing;







    public function mount($id)
    {

        // 1: get instance
        $serving = MealServing::where('mealId', $id)->first();

        foreach ($serving->toArray() as $key => $value)
            $this->instanceServing->{$key} = $value;




        // 1.2: assignMeal
        $this->instance->mealId = $id;




    } // end function







    // -----------------------------------------------------








    public function store()
    {

        // :: validation
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/packings/store', $this->instance);




        // :: reset - render - alert
        $this->instance->reset('name', 'amount', 'remarks');

        $this->makeAlert('success', $response->message);
        $this->render();






    } // end function















    // -----------------------------------------------------








    public function updateServing()
    {



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/servings/update', $this->instanceServing);




        // :: reset - render - alert
        $this->makeAlert('success', $response->message);




    } // end function








    // -----------------------------------------------------











    #[On('refreshPackings')]
    public function render()
    {


        // 1: dependencies
        $packings = $this->instance?->mealId ? MealPacking::where('mealId', $this->instance->mealId)->get() : [];


        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-manage-packings', compact('packings'));


    } // end function


} // end class
