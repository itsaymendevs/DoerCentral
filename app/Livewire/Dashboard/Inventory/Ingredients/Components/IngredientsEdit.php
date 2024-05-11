<?php

namespace App\Livewire\Dashboard\Inventory\Ingredients\Components;

use App\Livewire\Forms\IngredientForm;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Models\Unit;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;



class IngredientsEdit extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variables
    public IngredientForm $instance;









    #[On('editIngredient')]
    public function remount($id)
    {

        // 1: clone instance / Files
        $ingredient = Ingredient::find($id);

        foreach ($ingredient->toArray() as $key => $value)
            $this->instance->{$key} = $value;

        $this->instance->imageFileName = $this->instance->imageFile;








        // 1.2: setFilePreview
        $preview = asset('storage/inventory/ingredients/' . $this->instance->imageFile);
        $this->dispatch('setFilePreview', filePreview: 'ingredient--preview-2', defaultPreview: $preview);






        // :: setSelect
        $this->dispatch('setSelect', id: '#unit-select-2', value: $ingredient->unitId);
        $this->dispatch('setSelect', id: '#purchaseUnit-select-2', value: $ingredient->purchaseUnitId);

        $this->dispatch('setSelect', id: '#category-select-2', value: $ingredient->categoryId);
        $this->dispatch('setSelect', id: '#group-select-2', value: $ingredient->groupId);
        $this->dispatch('setSelect', id: '#exclude-select-2', value: $ingredient->excludeId);
        $this->dispatch('setSelect', id: '#allergy-select-2', value: $ingredient->allergyId);



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







        // 1: uploadFileFiles
        if ($this->instance->imageFile != $this->instance->imageFileName) {

            $this->instance->imageFileName = $this->replaceFile($this->instance->imageFile, 'inventory/ingredients', $this->instance->imageFileName, 'ING');

        } // end if










        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/ingredients/update', $this->instance);






        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('closeModal', modal: '#edit-ingredient .btn--close');
        $this->dispatch('resetFile', file: 'ingredient--file-2', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response?->message);



    } // end function











    // -----------------------------------------------------------







    public function render()
    {


        // 1: dependencies
        $categories = IngredientCategory::all();
        $groups = IngredientGroup::all();
        $excludes = Exclude::all();
        $allergies = Allergy::all();
        $units = Unit::all();



        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.ingredients.components.ingredients-edit', compact('categories', 'groups', 'excludes', 'allergies', 'units'));


    } // end function


} // end class
