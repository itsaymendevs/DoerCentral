<?php

namespace App\Livewire\Dashboard\Inventory\Ingredients\Components;

use App\Livewire\Forms\IngredientBrandForm;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class IngredientsBrands extends Component
{


    use HelperTrait;



    // :: variables
    public IngredientBrandForm $instance;
    public $ingredient;








    #[On('editBrands')]
    public function remount($id)
    {



        // 1: clone instance
        $this->ingredient = Ingredient::find($id);

        $this->instance->ingredientId = $this->ingredient->id;



    } // end function








    // -----------------------------------------------------------




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



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/ingredients/brands/store', $this->instance);






        // :: resetForm - refresh
        $this->instance->reset();
        $this->instance->ingredientId = $this->ingredient->id;

        $this->dispatch('refreshViews');



        // :: alert
        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------








    #[On('refreshBrands')]
    public function render()
    {


        // 1: dependencies
        $brands = IngredientMacro::where('ingredientId', $this->ingredient?->id)?->get();


        // :: initTooltips
        $this->dispatch('initTooltips');




        return view('livewire.dashboard.inventory.ingredients.components.ingredients-brands', compact('brands'));




    } // end function


} // end class
