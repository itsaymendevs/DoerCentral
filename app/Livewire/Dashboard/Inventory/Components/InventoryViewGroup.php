<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\IngredientGroupForm;
use App\Models\IngredientGroup;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewGroup extends Component
{



    use HelperTrait;




    // :: variables
    public IngredientGroupForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $group = IngredientGroup::find($id);

        foreach ($group->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function





    // -----------------------------------------------------------








    public function update()
    {

        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/groups/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




    } // end function










    // -----------------------------------------------------------------








    public function remove($id)
    {


        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmGroupRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmGroupRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/inventory/configurations/groups/remove', $this->removeId);
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


        return view('livewire.dashboard.inventory.components.inventory-view-group');

    } // end function


} // end class
