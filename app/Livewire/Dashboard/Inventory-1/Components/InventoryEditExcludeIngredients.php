<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ExcludeForm;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryEditExcludeIngredients extends Component
{


    use HelperTrait;


    // :: variables
    public ExcludeForm $instance;









    #[On('editExcludeIngredients')]
    public function remount($id)
    {

        // 1: clone instance
        $exclude = Exclude::find($id);

        foreach ($exclude->toArray() as $key => $value)
            $this->instance->{$key} = $value;



        // 1.2: getIngredients
        $this->instance->ingredients = $exclude?->ingredients?->pluck('id')?->toArray() ?? [];






        // :: setSelect
        $this->dispatch('setSelect', id: '#exclude-ingredients-select-2', value: $this->instance->ingredients);



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
        $response = $this->makeRequest('dashboard/inventory/configurations/excludes/ingredients/update', $this->instance);






        // :: resetForm
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-exclude .btn--close');


        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::all();



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.components.inventory-edit-exclude-ingredients', compact('ingredients'));


    } // end function


} // end class



