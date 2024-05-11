<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\IngredientForm;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Models\Unit;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class InventoryCreateIngredient extends Component
{


    use HelperTrait;
    use WithFileUploads;



    // :: variable
    public IngredientForm $instance;






    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------







        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'inventory/ingredients', 'ING');







        // 1.2: makeRequest
        $response = $this->makeRequest('dashboard/inventory/ingredients/store', $this->instance);






        // :: refresh - closeModal
        $this->instance->reset();
        $this->dispatch('resetSelect');
        $this->dispatch('refreshViews');
        $this->dispatch('resetFile', file: 'ingredient--file-1', defaultPreview: $this->getDefaultPreview());
        $this->dispatch('closeModal', modal: '#new-ingredient .btn--close');



        $this->makeAlert('success', $response?->message);




    } // end function





    // ------------------------------------------------------------------









    public function render()
    {



        // 1: dependencies
        $categories = IngredientCategory::all();
        $groups = IngredientGroup::all();
        $excludes = Exclude::all();
        $allergies = Allergy::all();
        $units = Unit::all();





        return view('livewire.dashboard.inventory.components.inventory-create-ingredient', compact('categories', 'groups', 'excludes', 'allergies', 'units'));


    } // end function


} // end class
