<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class InventoryViewIngredients extends Component
{


    use HelperTrait;
    use WithPagination;




    // :: variable
    public $searchIngredient = '';
    public $searchCategory, $searchGroup, $searchAllergy, $searchExclude;

    public $removeId;








    public function editBrands($id)
    {

        // :: dispatchId
        $this->dispatch('editIngredientBrands', $id);

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

            $response = $this->makeRequest('dashboard/inventory/ingredients/remove', $this->removeId);
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
        $categories = IngredientCategory::all();
        $groups = IngredientGroup::all();
        $excludes = Exclude::all();
        $allergies = Allergy::all();







        // --------------------------------
        // --------------------------------







        // 1.2: ingredients - makeFilter
        $ingredientsRaw = Ingredient::where('name', 'LIKE', '%' . $this->searchIngredient . '%')->get();


        $ingredients = $ingredientsRaw->filter(function ($item) {

            // :: applyFilters
            $toReturn = true;


            // 1: category - group - exclude - allergy
            $this->searchCategory ? $item->categoryId != $this->searchCategory ? $toReturn = false : null : null;

            $this->searchGroup ? $item->groupId != $this->searchGroup ? $toReturn = false : null : null;

            $this->searchExclude ? $item->excludeId != $this->searchExclude ? $toReturn = false : null : null;

            $this->searchAllergy ? $item->allergyId != $this->searchAllergy ? $toReturn = false : null : null;


            return $toReturn;

        });





        // 1.2.2: applyPagination
        $ingredients = Ingredient::whereIn('id', $ingredients?->pluck('id')?->toArray() ?? [])
            ->paginate(24, pageName: 'ingredients');











        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.inventory.components.inventory-view-ingredients', compact('ingredients', 'categories', 'groups', 'excludes', 'allergies'));


    } // end function


} // end class



