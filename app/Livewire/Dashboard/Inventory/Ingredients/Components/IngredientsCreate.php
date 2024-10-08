<?php

namespace App\Livewire\Dashboard\Inventory\Ingredients\Components;

use App\Livewire\Forms\IngredientForm;
use App\Models\Allergy;
use App\Models\Exclude;
use App\Models\IngredientCategory;
use App\Models\IngredientGroup;
use App\Models\Unit;
use App\Traits\HelperTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class IngredientsCreate extends Component
{



    use HelperTrait;
    use WithFileUploads;



    // :: variable
    public IngredientForm $instance;






    public function store()
    {



        // 1: uploadFile
        if ($this->instance->imageFile)
            $this->instance->imageFileName = $this->uploadFile($this->instance->imageFile, 'inventory/ingredients', 'ING', 300, 300);







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
        $units = Unit::all();




        return view('livewire.dashboard.inventory.ingredients.components.ingredients-create', compact('units'));


    } // end function


} // end class
