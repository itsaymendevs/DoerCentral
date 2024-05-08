<?php

namespace App\Livewire\Dashboard\Inventory\Components;

use App\Livewire\Forms\ExcludeForm;
use App\Models\Exclude;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class InventoryViewExclude extends Component
{
    use HelperTrait;




    // :: variables
    public ExcludeForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $exclude = Exclude::find($id);

        foreach ($exclude->toArray() as $key => $value)
            $this->instance->{$key} = $value;




    } // end function













    // -----------------------------------------------------------------








    public function update()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Edit Actions')) {

            $this->makeAlert('info', 'Editing is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------






        // :: validate
        $this->instance->validate();



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/inventory/configurations/excludes/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




    } // end function











    // -----------------------------------------------------------------








    public function editIngredients($id)
    {


        // 1: dispatchEvent
        $this->dispatch('editExcludeIngredients', $id);



    } // end function










    // -----------------------------------------------------------------








    public function remove($id)
    {


        // :: rolePermission
        if (! session('globalUser')->checkPermission('Remove Actions')) {

            $this->makeAlert('info', 'Deletion is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------




        // 1: params - confirmationBox
        $this->removeId = $id;

        $this->makeAlert('remove', null, 'confirmExcludeRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmExcludeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/inventory/configurations/excludes/remove', $this->removeId);
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


        return view('livewire.dashboard.inventory.components.inventory-view-exclude');

    } // end function


} // end class

