<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ConversionForm;
use App\Models\Conversion;
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



    } // end function








    // -----------------------------------------------------------




    public function update()
    {



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
        $ingredients = Ingredient::all();
        $cookingTypes = CookingType::all();





        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.components.inventory-edit-conversion-ingredients', compact('ingredients', 'cookingTypes'));


    } // end function


} // end class



