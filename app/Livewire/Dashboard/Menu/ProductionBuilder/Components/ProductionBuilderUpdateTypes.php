<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealForm;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\Type;
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
        $this->cloneInstance($id);


    } // end function








    // -----------------------------------------------------









    #[On('refreshTypeViews')]
    public function cloneInstance($id)
    {


        // :: clone instance
        $this->meal = Meal::find($id);


        foreach ($this->meal->toArray() as $key => $value)
            $this->instance->{$key} = $value;


        $this->instance->mealTypes = $this->meal->type->name == 'Recipe' && $this->meal?->types ? $this->meal?->types?->pluck('mealTypeId')->toArray() : [];




        $this->render();


    } // end function










    // -----------------------------------------------------








    public function update()
    {




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/meal-types/update', $this->instance);



        // :: alert
        // $this->makeAlert('success', $response->message);


    } // end function











    // -----------------------------------------------------









    public function render()
    {




        // 1: dependencies
        $type = Type::where('name', 'Recipe')->first();
        $mealTypes = MealType::where('typeId', $type->id)->get();


        $snackTypes = ['Sweet', 'Savoury'];
        $drinkTypes = ['Hot Drink', 'Cold Drink'];
        $sauceTypes = ['On Side', 'Part of Meal'];
        $subRecipeTypes = ['Protein', 'Carbs', 'Veg'];






        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.menu.production-builder.components.production-builder-update-types', compact('mealTypes', 'snackTypes', 'drinkTypes', 'sauceTypes', 'subRecipeTypes'));


    } // end function


} // end class
