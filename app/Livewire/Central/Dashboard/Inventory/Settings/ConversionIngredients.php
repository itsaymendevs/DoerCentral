<?php

namespace App\Livewire\Central\Dashboard\Inventory\Settings;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\CookingType;
use App\Models\Ingredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class ConversionIngredients extends Component
{


    use HelperTrait;


    // :: variables
    public ConversionForm $instance;
    public $conversionIngredients, $conversion;
    public $removeToken;




    public function mount($id)
    {



        // 1: get instance
        $this->conversion = Conversion::find($id);

        foreach ($this->conversion->toArray() as $key => $value)
            $this->instance->{$key} = $value;






        // -----------------------------------------
        // -----------------------------------------




        // 1.2: loop - ingredientsByIngredient
        foreach ($this->conversion?->ingredients?->groupBy('groupToken') ?? [] as $commonToken => $conversionIngredientsByToken) {




            // :: ingredientId
            $this->instance->ingredients[$commonToken]['ingredientId'] = $conversionIngredientsByToken?->first()->ingredientId ?? null;






            // 1.3: loop - ingredients
            foreach ($conversionIngredientsByToken ?? [] as $key => $conversionIngredient) {


                $this->instance->ingredients[$commonToken][$conversionIngredient->cookingTypeId] = $conversionIngredient->conversionValue;


            } // end loop - ingredients



        } // end loop - ingredientsByIngredient






        // ------------------------------------------
        // ------------------------------------------








        // :: initSelect - render
        $this->dispatch('initNewSelect');



    } // end function











    // -----------------------------------------------------------







    public function append()
    {



        // 1: makeRequest
        $response = $this->makeRequest('central/dashboard/inventory/settings/conversions/ingredients/store', $this->instance);




        // :: initSelect - render
        $this->dispatch('initNewSelect');

    } // end function










    // -----------------------------------------------------------












    public function update()
    {



        // :: validation
        $this->instance->validate();




        // 1: makeRequest
        $response = $this->makeRequest('central/dashboard/inventory/settings/conversions/ingredients/update', $this->instance);




        // :: alert
        $this->makeAlert('success', $response?->message);


    } // end function
















    // -----------------------------------------------------------------








    public function remove($groupToken)
    {


        // 1: params - confirmationBox
        $this->removeToken = $groupToken;

        $this->makeAlert('remove', null, 'confirmConversionIngredientRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmConversionIngredientRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeToken) {



            // 1.2: makeRequest
            $response = $this->makeRequest('central/dashboard/inventory/settings/conversions/ingredients/remove', $this->removeToken);
            $this->makeAlert('info', $response->message);





            // 1.3: remove groupToken
            return $this->redirect(route('central.dashboard.inventory.settings.conversionIngredients', [$this->conversion->id]), navigate: false);






        } // end if





    } // end function















    // -----------------------------------------------------------














    public function render()
    {


        // 1: dependencies
        $cookingTypes = CookingType::all();
        $ingredients = Ingredient::all();




        // 1.2: conversionIngredients
        $this->conversionIngredients = ConversionIngredient::where('conversionId', $this->instance?->id)?->get();





        return view('livewire.central.dashboard.inventory.settings.conversion-ingredients', compact('ingredients', 'cookingTypes'));




    } // end function







} // end class
