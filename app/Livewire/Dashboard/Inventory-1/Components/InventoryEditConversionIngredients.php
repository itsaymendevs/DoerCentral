<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\CookingType;
use App\Models\Ingredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryEditConversionIngredients extends Component
{





    use HelperTrait;


    // :: variables
    public ConversionForm $instance;
    public $conversionIngredients;








    #[On('editConversionIngredients')]
    public function remount($id)
    {

        // 1: clone instance
        $conversion = Conversion::find($id);

        foreach ($conversion->toArray() as $key => $value)
            $this->instance->{$key} = $value;






        // -----------------------------------------
        // -----------------------------------------




        // 1.2: loop - ingredientsByIngredient
        foreach ($conversion?->ingredients?->groupBy('groupToken') ?? [] as $commonToken => $conversionIngredientsByIngredient) {



            // 1.3: loop - ingredients
            foreach ($conversionIngredientsByIngredient ?? [] as $key => $conversionIngredient) {


                $this->instance->ingredients[$commonToken][$conversionIngredient->cookingTypeId] = $conversionIngredient->conversionValue;


            } // end loop - ingredients



        } // end loop - ingredientsByIngredient







        // :: refresh
        $this->render();



    } // end function







    // -----------------------------------------------------------





    public function append()
    {




        // 1: create ingredient


        // 1.2: cookingTypes
        $cookingTypes = CookingType::all();

        foreach ($cookingTypes as $cookingType) {


            // 1: create ingredient
            $conversionIngredient = new ConversionIngredient();

            $conversionIngredient->cookingTypeId = $cookingType->id;
            $conversionIngredient->conversionId = $this->instance->id;

            $conversionIngredient->groupToken = $this->makeGroupToken();

            $conversionIngredient->save();

        } // end loop







    } // end function



    // -----------------------------------------------------------







    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // :: validation
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/settings/conversions/ingredients/update', $this->instance);






        // :: resetForm
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-conversion-ingredients .btn--close');


        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $cookingTypes = CookingType::all();




        // 1.2: conversionIngredients - ingredients
        $conversionIngredients = ConversionIngredient::where('conversionId', $this->instance?->id)?->get();
        $ingredients = Ingredient::whereNotIn('id', $conversionIngredients?->pluck('ingredientId')?->toArray() ?? [])->get();




        // :: initTooltips
        $this->dispatch('initTooltips');





        return view('livewire.dashboard.inventory.components.inventory-edit-conversion-ingredients', compact('ingredients', 'cookingTypes', 'conversionIngredients'));


    } // end function







} // end class



