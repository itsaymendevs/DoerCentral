<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\DietForm;
use App\Models\Diet;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsViewDiet extends Component
{

    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public DietForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $diet = Diet::find($id);

        foreach ($diet->toArray() as $key => $value)
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




        // ## log - activity ##
        $this->storeActivity('Menu', "Updated diet {$this->instance->name}");




        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/diets/update', $this->instance);






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

        $this->makeAlert('remove', null, 'confirmDietRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmDietRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {




            // ## log - activity ##
            $this->storeActivity('Menu', "Removed diet {$this->instance->name}");




            // 1.2: makeRequest
            $response = $this->makeRequest('dashboard/menu/settings/diets/remove', $this->removeId);
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


        return view('livewire.dashboard.menu.settings.components.settings-view-diet');

    } // end function


} // end class

