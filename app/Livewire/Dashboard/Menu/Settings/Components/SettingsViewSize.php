<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\SizeForm;
use App\Models\Size;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsViewSize extends Component
{



    use HelperTrait;
    use ActivityTrait;



    // :: variables
    public SizeForm $instance;

    public $removeId;





    public function mount($id)
    {

        // 1: clone instance
        $size = Size::find($id);

        foreach ($size->toArray() as $key => $value)
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
        $this->storeActivity('Menu', "Updated Size {$this->instance->name}");



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/sizes/update', $this->instance);






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

        $this->makeAlert('remove', null, 'confirmSizeRemove');



    } // end function







    // -----------------------------------------------------------





    #[On('confirmSizeRemove')]
    public function confirmRemove()
    {



        // 1: remove
        if ($this->removeId) {



            // ## log - activity ##
            $this->storeActivity('Menu', "Removed Size {$this->instance->name}");




            // 1.1: makeRequest
            $response = $this->makeRequest('dashboard/menu/settings/sizes/remove', $this->removeId);
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


        return view('livewire.dashboard.menu.settings.components.settings-view-size');

    } // end function


} // end class


