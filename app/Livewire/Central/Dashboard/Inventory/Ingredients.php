<?php

namespace App\Livewire\Central\Dashboard\Inventory;

use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Ingredients extends Component
{




    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchIngredient = '';









    public function editBrands($id)
    {

        // :: dispatchId
        $this->dispatch('editBrands', $id);

    } // end function







    // -----------------------------------------------------------------






    public function edit($id)
    {

        // 1: dispatchId
        $this->dispatch('editIngredient', $id);


    } // end function






    // -----------------------------------------------------------------




    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmIngredientRemove');



    } // end function







    // -----------------------------------------------------------------------------





    #[On('confirmIngredientRemove')]
    public function confirmRemove()
    {


        // 1: remove
        if ($this->removeId) {




            // 1.2: makeRequest
            $response = $this->makeRequest('central/dashboard/inventory/ingredients/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: renderView
            $this->render();


        } // end if



    } // end function






    // ----------------------------------------------------------------






    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $ingredients = Ingredient::orderBy('created_at', 'desc')
            ->where('name', 'LIKE', '%' . $this->searchIngredient . '%')
            ->paginate(env('PAGINATE_XXL'));










        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.central.dashboard.inventory.ingredients', compact('ingredients'));


    } // end function


} // end class
