<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\CuisineForm;
use App\Models\Cuisine;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsViewCuisine extends Component
{
    use HelperTrait;




    // :: variables
    public CuisineForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $cuisine = Cuisine::find($id);

        foreach ($cuisine->toArray() as $key => $value)
            $this->instance->{$key} = $value;





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




        // :: validate
        $this->instance->validate();





        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/cuisines/update', $this->instance);






        // :: alert
        $this->makeAlert('success', $response?->message);




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

        $this->makeAlert('remove', null, 'confirmCuisineRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmCuisineRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {


            $response = $this->makeRequest('dashboard/menu/settings/cuisines/remove', $this->removeId);
            $this->makeAlert('info', $response->message);



            // 1.2: refreshViews / Settings
            $this->dispatch('refreshViews');


        } // end if





    } // end function









    // -----------------------------------------------------------






    public function render()
    {


        // :: initTooltips
        $this->dispatch('initTooltips');


        return view('livewire.dashboard.menu.settings.components.settings-view-cuisine');

    } // end function


} // end class
