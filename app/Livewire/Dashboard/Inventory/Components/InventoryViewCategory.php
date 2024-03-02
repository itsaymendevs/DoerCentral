<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\IngredientCategoryForm;
use App\Models\IngredientCategory;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewCategory extends Component
{


    use HelperTrait;




    // :: variables
    public IngredientCategoryForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $category = IngredientCategory::find($id);

        foreach ($category->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function





    // -----------------------------------------------------------








    public function update()
    {

        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/categories/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




    } // end function










    // -----------------------------------------------------------------








    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmCategoryRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmCategoryRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/inventory/configurations/categories/remove', $this->removeId);
            $this->makeAlert('info', $response->message);




            // 1.2: renderConfigurations / Settings
            $this->dispatch('refreshViews');


        } // end if





    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.inventory.components.inventory-view-category');

    } // end function


} // end class

