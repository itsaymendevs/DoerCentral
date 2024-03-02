<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\IngredientCategoryForm;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryManageCategories extends Component
{



    use HelperTrait;



    // :: variables
    public IngredientCategoryForm $instance;








    public function store()
    {



        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/categories/store', $this->instance);




        // :: refresh / closeModal
        $this->instance->reset();
        $this->dispatch('refreshViews');
        $this->dispatch('initTooltips');



        // :: alert
        $this->makeAlert('success', $response?->message);



    } // end function










    // -------------------------------------------------------







    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $categories = IngredientCategory::all();



        return view('livewire.dashboard.inventory.components.inventory-manage-categories', compact('categories'));


    } // end function



} // end class


