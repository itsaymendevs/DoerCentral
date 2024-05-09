<?php

namespace App\Livewire\Dashboard\Menu\ProductionBuilder\Components;

use App\Livewire\Forms\MealPackingForm;
use App\Livewire\Forms\MealServingForm;
use App\Models\Meal;
use App\Models\MealPacking;
use App\Models\MealServing;
use App\Models\MealServingInstruction;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use stdClass;

class ProductionBuilderManagePackings extends Component
{
    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public MealPackingForm $instance;
    public MealServingForm $instanceServing;
    public $servingInstructions;









    public function mount($id)
    {

        // 1: get instance
        $serving = MealServing::where('mealId', $id)->first();

        foreach ($serving->toArray() as $key => $value)
            $this->instanceServing->{$key} = $value;




        // 1.2: assignMeal
        $this->instance->mealId = $id;






        // -----------------------------
        // -----------------------------






        // 1.3: servingInstructions
        $this->servingInstructions = MealServingInstruction::where('mealId', $id)->get();


    } // end function







    // -----------------------------------------------------








    public function store()
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validation
        $this->instance->validate();



        // ## log - activity ##
        $meal = Meal::find($this->instance->mealId);

        $this->storeActivity('Menu', "Created packing {$this->instance->name} for {$meal->name}");






        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/packings/store', $this->instance);




        // :: reset - render - alert
        $this->instance->reset('name', 'amount', 'remarks');

        $this->makeAlert('success', $response->message);
        $this->render();






    } // end function









    // -----------------------------------------------------








    public function toggleTag($id)
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
        $instance->id = $id;





        // ## log - activity ##
        $meal = Meal::find($this->instance->mealId);

        $this->storeActivity('Menu', "Toggled tag for {$meal->name}");




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/builder/serving-instructions/toggle', $instance);






    } // end function












    // -----------------------------------------------------








    public function updateServing()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





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
