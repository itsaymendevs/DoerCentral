<?php

namespace App\Livewire\Dashboard\Menu\Settings\Components;

use App\Livewire\Forms\SizeForm;
use App\Models\Size;
use App\Traits\ActivityTrait;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class SettingsManageSizes extends Component
{


    use HelperTrait;
    use ActivityTrait;


    // :: variables
    public SizeForm $instance;







    public function store()
    {



        // :: rolePermission
        if (! session('globalUser')->checkPermission('Add Actions')) {

            $this->makeAlert('info', 'Adding is not allowed for this account');

            return false;

        } // end if





        // --------------------------------------
        // --------------------------------------





        // :: validate
        $this->instance->validate();




        // ## log - activity ##
        $this->storeActivity('Menu', "Created size {$this->instance->name}");



        // 1: makeRequest
        $response = $this->makeRequest('dashboard/menu/settings/sizes/store', $this->instance);








        // :: resetForm - resetFilePreview
        $this->instance->reset();
        $this->dispatch('refreshViews');



        $this->makeAlert('success', $response->message);




    } // end function





    // ------------------------------------------------------------------














    #[On('refreshViews')]
    public function render()
    {


        // 1: dependencies
        $sizes = Size::all();




        // :: initTooltips
        $this->dispatch('initTooltips');



        return view('livewire.dashboard.menu.settings.components.settings-manage-sizes', compact('sizes'));

    } // end function



} // end class



